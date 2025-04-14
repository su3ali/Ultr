<?php
namespace App\Http\Controllers\Dashboard\BusinessProject;

use App\Http\Controllers\Controller;
use App\Models\BusinessProject\ClientProject;
use App\Models\BusinessProject\ClientProjectBranch;
use App\Models\BusinessProject\ClientProjectBranchFloor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProjectFloorController extends Controller
{

    public function index()
    {
        if (request()->ajax()) {
            $floors = ClientProjectBranchFloor::with('branch')
                ->when(request('branch_id'), function ($query, $branchId) {
                    $query->where('branch_id', $branchId);
                })
                ->when(request('project_id'), function ($query, $projectId) {
                    $query->whereHas('branch', function ($q) use ($projectId) {
                        $q->where('client_project_id', $projectId);
                    });
                })
                ->latest();

            return DataTables::of($floors)
                ->addColumn('name', function ($row) {
                    $locale = app()->getLocale();
                    return $locale === 'ar'
                    ? ($row->name_ar ?? $row->name_en ?? '-')
                    : ($row->name_en ?? $row->name_ar ?? '-');
                })
                ->addColumn('branch_name', function ($row) {
                    return $row->branch->name_ar ?? '-';
                })
                ->addColumn('project_name', function ($row) {
                    return $row->branch->project->name_ar ?? '-';
                })
                ->addColumn('status', function ($row) {
                    $checked = $row->active == 1 ? 'checked' : '';
                    return '<label class="switch s-outline s-outline-info mb-0">
                                <input type="checkbox" class="change-status-switch" data-id="' . $row->id . '" ' . $checked . '>
                                <span class="slider round"></span>
                            </label>';
                })

                ->addColumn('controll', function ($row) {
                    if ($row->deleted_at) {
                        $restoreUrl = route('dashboard.business-project-floors.restore', $row->id);
                        return '
                        <form action="' . $restoreUrl . '" method="POST" style="display:inline-block;">
                            ' . csrf_field() . method_field('PUT') . '
                            <button type="submit" class="btn btn-warning btn-sm" title="استرجاع">
                                <i class="fas fa-undo fa-2x"></i>
                            </button>
                        </form>
                        ';
                    }

                    $deleteUrl       = route('dashboard.business-project-floors.destroy', $row->id);
                    $branchName      = e(optional($row->branch)->name_ar);
                    $dataProjectName = e(optional($row->branch->project)->name_ar);
                    $dataProjectId   = $row->branch?->client_project_id ?? ''; // <-- هنا الإضافة الجديدة
                    $branchId        = $row->branch_id;

                    return '
                        <button type="button"
                            class="btn btn-primary btn-sm view mr-1"
                            data-toggle="modal"
                            data-target="#showFloorModal"
                            data-id="' . $row->id . '"
                            data-name_ar="' . e($row->name_ar) . '"
                            data-name_en="' . e($row->name_en) . '"
                            data-branch_name="' . $branchName . '"
                            data-project_name="' . $dataProjectName . '"
                            data-floor_number="' . $row->floor_number . '"
                            data-type="' . e($row->type) . '"
                            data-active="' . ($row->active ? 1 : 0) . '"
                            title="عرض">
                            <i class="far fa-eye fa-2x"></i>
                        </button>

                        <button type="button"
                            class="btn btn-primary btn-sm edit mr-1"
                            data-toggle="modal"
                            data-target="#editModel"
                            data-id="' . $row->id . '"
                            data-name_ar="' . e($row->name_ar) . '"
                            data-name_en="' . e($row->name_en) . '"
                            data-project_id="' . $dataProjectId . '"
                            data-branch_id="' . $branchId . '"
                            data-floor_number="' . $row->floor_number . '"
                            data-active="' . ($row->active ? 1 : 0) . '"
                            title="تعديل">
                            <i class="far fa-edit fa-2x"></i>
                        </button>

                        <a href="javascript:void(0);"
                            data-href="' . $deleteUrl . '"
                            data-id="' . $row->id . '"
                            class="btn btn-outline-danger btn-sm btn-delete"
                            title="حذف">
                            <i class="far fa-trash-alt fa-2x"></i>
                        </a>
                    ';
                })

                ->rawColumns(['name','project_name', 'branch_name', 'status', 'controll'])
                ->make(true);
        }

        $projects = ClientProject::select('id', 'name_ar', 'name_en')->get();
        $branches = ClientProjectBranch::select('id', 'name_ar', 'name_en')->get();

        return view('dashboard.business_project_floors.index', compact('branches', 'projects'));
    }

    public function create()
    {
        $branches = ClientProjectBranch::select('id', 'name_ar', 'name_en')->get();
        return view('dashboard.business_project_floors.create', compact('branches'));
    }

    protected function change_status(Request $request)
    {
        try {
            $floor = ClientProjectBranchFloor::findOrFail($request->id);

            $is_active = $request->is_active == 1 ? 1 : 0;

            $floor->update(['active' => $is_active]);

            return response()->json([
                'status'     => true,
                'message'    => 'تم تحديث الحالة بنجاح.',
                'new_status' => $is_active,
            ], 200);

        } catch (\Exception $e) {
            \Log::error('Error updating floor status:', ['error' => $e->getMessage()]);

            return response()->json([
                'status'  => false,
                'message' => 'فشل في تحديث الحالة.',
            ], 500);
        }
    }

    public function destroy($id)
    {

        $floor = ClientProjectBranchFloor::findOrFail($id);
        $floor->delete();

        return [
            'success' => true,
            'msg'     => __("dash.deleted_success"),
        ];

    }

    public function restore($id)
    {
        $floor = ClientProjectBranchFloor::onlyTrashed()->findOrFail($id);
        $floor->restore();

        return redirect()->back()->with('success', 'تم استرجاع الطابق بنجاح.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'branch_id'    => 'required|exists:client_project_branches,id',
            'name_ar'      => 'required|string|max:255',
            'name_en'      => 'required|string|max:255',
            'floor_number' => 'nullable|integer',
            'active'       => 'nullable|boolean', //
        ]);

        $floor = ClientProjectBranchFloor::findOrFail($id);

        $floor->update([
            'branch_id'    => $request->branch_id,
            'name_ar'      => $request->name_ar,
            'name_en'      => $request->name_en,
            'floor_number' => $request->floor_number,
            'active'       => $request->has('active') ? 1 : 0,
        ]);

        return redirect()->route('dashboard.business-project-floors.index')
            ->with('success', 'تم تحديث بيانات الطابق بنجاح.');
    }

    public function show($id)
    {
        $floor = ClientProjectBranchFloor::with('branch')->findOrFail($id);

        return view('dashboard.business_project_floors.show', compact('floor'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'branch_id'    => 'required|exists:client_project_branches,id',
            'name_ar'      => 'required|string|max:255',
            'name_en'      => 'required|string|max:255',
            'floor_number' => 'nullable|integer',
        ]);

        ClientProjectBranchFloor::create([
            'branch_id'    => $request->branch_id,
            'name_ar'      => $request->name_ar,
            'name_en'      => $request->name_en,
            'floor_number' => $request->floor_number,
            'active'       => true,
        ]);

        return redirect()->route('dashboard.business-project-floors.index')
            ->with('success', 'تم إضافة الطابق بنجاح.');
    }

}
