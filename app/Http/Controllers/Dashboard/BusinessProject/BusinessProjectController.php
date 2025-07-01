<?php
namespace App\Http\Controllers\Dashboard\BusinessProject;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\BusinessProject\ClientProject;
use App\Models\BusinessProject\ClientProjectBranch;
use App\Models\ClientProjectServicePrice;
use App\Models\Service;
use App\Traits\imageTrait;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class BusinessProjectController extends Controller
{

    use imageTrait;
    public function index()
    {
        $projects = ClientProject::select('id', 'name_ar', 'name_en')->get();
        $services = Service::all();

        if (request()->ajax()) {
            $projects = ClientProject::withCount('branches')
                ->with('branches.floors')
                ->latest();

            return DataTables::of($projects)
                ->addColumn('name', function ($row) {
                    return $row->name_ar . ' / ' . $row->name_en;
                })

                ->addColumn('controll', function ($row) {
                    $user = auth()->user();
                    $html = '';

                    // Edit button
                    if ($user->can('business_orders_projects_update') || $user->hasRole('admin')) {
                        $html .= '
                    <button type="button"
                        class="btn btn-primary btn-sm mr-2 edit-project"
                        data-id="' . $row->id . '"
                        data-name_ar="' . e($row->name_ar) . '"
                        data-name_en="' . e($row->name_en) . '"
                        data-action="' . route('dashboard.business_projects.update', $row->id) . '"
                        data-toggle="modal"
                        data-target="#editModel"
                        title="تعديل">
                        <i class="far fa-edit fa-2x"></i>
                    </button>';
                    }

                    //  Delete button
                    if ($user->can('business_orders_projects_delete') || $user->hasRole('admin')) {
                        $html .= '
                    <a href="javascript:void(0);"
                        data-href="' . route('dashboard.business_projects.destroy', $row->id) . '"
                        data-id="' . $row->id . '"
                        class="btn btn-outline-danger btn-sm btn-delete"
                        title="حذف">
                        <i class="far fa-trash-alt fa-2x"></i>
                    </a>';
                    }

                    return $html;
                })

                ->rawColumns(['name', 'controll'])
                ->make(true);
        }

        return view('dashboard.business_projects.index', compact('projects', 'services'));
    }

    public function create()
    {
        $clientProjects = ClientProject::select('id', 'name_ar', 'name_en')->get();

        return view('dashboard.business_projects.create');
    }
    public function edit($id)
    {

        return view('dashboard.business_projects.edit');
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name_ar'          => ['required', 'string', 'max:255'],
            'name_en'          => ['required', 'string', 'max:255'],
            'description'      => ['nullable', 'string'],
            'admin_first_name' => ['required', 'string', 'max:100'],
            'admin_last_name'  => ['required', 'string', 'max:100'],
            'admin_phone'      => ['nullable', 'numeric', 'unique:admins,phone'],
            'admin_email'      => ['required', 'email', 'unique:admins,email'],
            'admin_password'   => ['required', 'confirmed', 'min:6'],
        ]);

        DB::beginTransaction();

        try {
            $project = ClientProject::create([
                'name_ar'     => $validated['name_ar'],
                'name_en'     => $validated['name_en'],
                'description' => $validated['description'] ?? null,
                'code'        => $request->code ?? null,
                'active'      => true,
                'created_by'  => $user->id,
                'updated_by'  => $user->id,
            ]);

            $admin = Admin::create([
                'first_name' => $validated['admin_first_name'],
                'last_name'  => $validated['admin_last_name'],
                'phone'      => $validated['admin_phone'] ?? null,
                'email'      => $validated['admin_email'],
                'password'   => bcrypt($validated['admin_password']),
                'type'       => 'client_admin',
                'active'     => true,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ]);

            //  Attach project to admin through pivot table
            $admin->clientProjects()->attach($project->id);

            DB::commit();

            return redirect()
                ->route('dashboard.business_projects.index')
                ->with('success', 'تم إنشاء المشروع وربط المسؤول به بنجاح.');
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error('Project creation failed', [
                'error'   => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
                'request' => $request->all(),
            ]);

            return back()->withErrors('حدث خطأ أثناء إنشاء المشروع. الرجاء المحاولة مرة أخرى.');
        }
    }

    public function showBranchesAndFloors($projectId)
    {
        $branches = ClientProjectBranch::with('floors')
            ->where('client_project_id', $projectId)
            ->get();

        return view('dashboard.business_projects.branches_floors', compact('branches'));
    }

    public function destroy($id)
    {
        $project = ClientProject::with('branches.floors')->findOrFail($id);

        // حذف الطوابق المرتبطة بكل فرع
        foreach ($project->branches as $branch) {
            $branch->floors()->delete();
        }

        $project->branches()->delete();

        $project->delete();

        return [
            'success' => true,
            'msg'     => __("dash.deleted_success"),
        ];
    }

    public function getPrice(Request $request)
    {
        $validated = $request->validate([
            'client_project_id' => ['required', 'exists:client_projects,id'],
            'service_id'        => ['required', 'exists:services,id'],
        ]);

        $price = ClientProjectServicePrice::query()
            ->where('client_project_id', $validated['client_project_id'])
            ->where('service_id', $validated['service_id'])
            ->value('price');

        // fallback: get default service price
        if (is_null($price)) {
            $price = Service::query()->where('id', $validated['service_id'])->value('price');
        }

        return response()->json([
            'price' => $price,
        ]);
    }

}
