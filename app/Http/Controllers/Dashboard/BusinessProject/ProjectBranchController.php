<?php
namespace App\Http\Controllers\Dashboard\BusinessProject;

use App\Http\Controllers\Controller;
use App\Models\BusinessProject\ClientProject;
use App\Models\BusinessProject\ClientProjectBranch;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProjectBranchController extends Controller
{

    public function index()
    {
        if (request()->ajax()) {
            $projects = ClientProjectBranch::with('project')
                ->when(request('client_project_id'), function ($query, $projectId) {
                    $query->where('client_project_id', $projectId);
                })
                ->latest();

            return DataTables::of($projects)
                ->addColumn('name', function ($row) {
                    $locale = app()->getLocale();
                    return $locale === 'ar'
                    ? ($row->name_ar ?? $row->name_en ?? '-')
                    : ($row->name_en ?? $row->name_ar ?? '-');
                })

                ->addColumn('project_name', function ($row) {
                    return optional($row->project)->name_ar ?? '-';
                })
                ->addColumn('controll', function ($row) {
                    return '
                       <button
                        type="button"
                        class="btn btn-primary btn-sm edit"
                        data-toggle="modal"
                        data-target="#editModel"
                        data-id="' . $row->id . '"
                        data-name_ar="' . e($row->name_ar) . '"
                        data-name_en="' . e($row->name_en) . '"
                        data-client_project_id="' . $row->client_project_id . '"
                    >
                        <i class="far fa-edit fa-2x"></i>
                    </button>


                        <a href="javascript:void(0);"
                           data-href="' . route('dashboard.business-project-branches.destroy', $row->id) . '"
                           data-id="' . $row->id . '"
                           class="btn btn-outline-danger btn-sm btn-delete">
                            <i class="far fa-trash-alt fa-2x"></i>
                        </a>
                    ';
                })

                ->rawColumns(['name', 'project_name', 'controll'])
                ->make(true);
        }

        $clientProjects = ClientProject::select('id', 'name_ar', 'name_en')->get();
        return view('dashboard.business_project_branches.index', compact('clientProjects'));
    }

    public function create()
    {
        $projects = ClientProject::select('id', 'name_ar')->get();
        return view('dashboard.business_project_branches.create', compact('projects'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'client_project_id' => 'required|exists:client_projects,id',
            'name_ar'           => 'required|string|max:255',
            'name_en'           => 'required|string|max:255',
            'location'          => 'nullable|string|max:255',
        ]);

        ClientProjectBranch::create([
            'client_project_id' => $request->client_project_id,
            'name_ar'           => $request->name_ar,
            'name_en'           => $request->name_en,
            'location'          => $request->location,
            'active'            => true,
        ]);

        return redirect()->route('dashboard.business-project-branches.index')->with('success', 'تم إضافة الفرع بنجاح.');
    }

    public function edit($id)
    {

        return view('dashboard.business_project_branches.edit');
    }

    public function update(Request $request, $id)
    {
        $branch = ClientProjectBranch::findOrFail($id);

        $validated = $request->validate([
            'client_project_id' => 'required|exists:client_projects,id',
            'name_ar'           => 'required|string|max:255',
            'name_en'           => 'required|string|max:255',
        ]);

        try {
            $branch->update($validated);

            return redirect()->route('dashboard.business-project-branches.index')
                ->with('success', 'تم تعديل الفرع بنجاح.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['general' => 'حدث خطأ أثناء التحديث، الرجاء المحاولة لاحقاً.'])
                ->withInput()
                ->with('edit_mode', true);
        }
    }

    public function destroy($id)
    {
        $branch = ClientProjectBranch::find($id);

        $branch->delete();
        return [
            'success' => true,
            'msg'     => __("dash.deleted_success"),
        ];
    }

    public function getBranchesByProject($projectId)
    {
        $branches = ClientProjectBranch::where('client_project_id', $projectId)
            ->select('id', 'name_ar', 'name_en')
            ->get();

        return response()->json($branches);
    }

}
