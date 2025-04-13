<?php
namespace App\Http\Controllers\Dashboard\BusinessProject;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BusinessProject\StoreBusinessProjectRequest;
use App\Models\BusinessProject\ClientProject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Yajra\DataTables\Facades\DataTables;

class BusinessProjectController extends Controller
{
    /**
     * Show the form to create a new project with branches and floors
     */

    public function index(Request $request)
    {

        return($request->all());
        if ($request->ajax()) {
            $projectsQuery = ClientProject::withCount('branches')
                ->with('branches.floors')
                ->when($request->search_value, function ($query, $searchTerm) {
                    $query->where(function ($q) use ($searchTerm) {
                        $q->where('name_ar', 'like', "%{$searchTerm}%")
                            ->orWhere('name_en', 'like', "%{$searchTerm}%")
                            ->orWhere('code', 'like', "%{$searchTerm}%");
                    });
                })
                ->orderByDesc('created_at');

            return DataTables::of($projectsQuery)
                ->addColumn('branches_count', fn($row) => $row->branches_count)
                ->addColumn('floors_count', fn($row) =>
                    $row->branches->reduce(fn($carry, $branch) => $carry + $branch->floors->count(), 0)
                )
                ->addColumn('created_at', fn($row) => $row->created_at->format('Y-m-d'))
                ->addColumn('control', function ($row) {
                    $html = '<a href="' . route('business_projects.show', $row->id) . '"
                             class="btn btn-sm btn-outline-info" title="عرض التفاصيل">
                             <i class="fas fa-eye"></i>
                          </a>';

                    $html .= '<a href="' . route('business_projects.edit', $row->id) . '"
                             class="btn btn-sm btn-outline-primary ml-1" title="تعديل">
                             <i class="fas fa-edit"></i>
                          </a>';

                    $html .= '<a href="javascript:void(0);"
                             data-href="' . route('business_projects.destroy', $row->id) . '"
                             class="btn btn-sm btn-outline-danger ml-1 btn-delete" title="حذف">
                             <i class="fas fa-trash-alt"></i>
                          </a>';

                    return $html;
                })
                ->rawColumns(['control'])
                ->make(true);
        }

        return view('dashboard.business_projects.index');
    }
    public function create()
    {
        return view('dashboard.business_projects.create');
    }

    /**
     * Store the new project and its nested branches and floors
     */
    public function store(StoreBusinessProjectRequest $request)
    {
        DB::beginTransaction();

        try {
            // إنشاء المشروع (العمارة)
            $project = ClientProject::create([
                'name_ar'     => $request->name_ar,
                'name_en'     => $request->name_en,
                'description' => $request->description,
                'active'      => true,
                'created_by'  => auth()->id(),
                'updated_by'  => auth()->id(),
            ]);

            // إنشاء الفروع والطوابق التابعة
            foreach ($request->branches as $branchData) {
                $branch = $project->branches()->create([
                    'name_ar'  => $branchData['name_ar'],
                    'name_en'  => $branchData['name_en'],
                    'location' => $branchData['location'] ?? null,
                    'active'   => true,
                ]);

                foreach ($branchData['floors'] ?? [] as $floorData) {
                    $branch->floors()->create([
                        'name_ar'      => $floorData['name_ar'],
                        'name_en'      => $floorData['name_en'],
                        'floor_number' => $floorData['floor_number'] ?? null,
                        'type'         => $floorData['type'] ?? null,
                        'active'       => true,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('business_projects.create')->with('success', 'تم حفظ المشروع والفروع والطوابق بنجاح.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'حدث خطأ أثناء الحفظ: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $project = ClientProject::with('branches.floors')->findOrFail($id);
        return view('dashboard.business_projects.show', compact('project'));
    }

    public function edit($id)
    {
        $project = ClientProject::with('branches.floors')->findOrFail($id);
        return view('dashboard.business_projects.edit', compact('project'));
    }

    public function update(StoreBusinessProjectRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $project = ClientProject::findOrFail($id);
            $project->update([
                'name_ar'     => $request->name_ar,
                'name_en'     => $request->name_en,
                'description' => $request->description,
                'updated_by'  => auth()->id(),
            ]);

            // حذف القديم
            $project->branches()->each(function ($branch) {
                $branch->floors()->delete();
            });
            $project->branches()->delete();

            // إعادة الإدخال بنفس طريقة الإنشاء
            foreach ($request->branches as $branchData) {
                $branch = $project->branches()->create([
                    'name_ar'  => $branchData['name_ar'],
                    'name_en'  => $branchData['name_en'],
                    'location' => $branchData['location'] ?? null,
                    'active'   => true,
                ]);

                foreach ($branchData['floors'] ?? [] as $floorData) {
                    $branch->floors()->create([
                        'name_ar'      => $floorData['name_ar'],
                        'name_en'      => $floorData['name_en'],
                        'floor_number' => $floorData['floor_number'] ?? null,
                        'type'         => $floorData['type'] ?? null,
                        'active'       => true,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('business_projects.index')->with('success', 'تم تحديث المشروع بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'حدث خطأ أثناء التحديث: ' . $e->getMessage()]);
        }
    }

}
