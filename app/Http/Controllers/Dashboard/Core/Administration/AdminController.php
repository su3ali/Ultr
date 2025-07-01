<?php
namespace App\Http\Controllers\Dashboard\Core\Administration;

use App\Datatables\Dashboard\Core\Administration\AdminsDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Administration\AdminRequest;
use App\Models\Admin;
use App\Models\AdminRegion;
use App\Models\BusinessProject\ClientProject;
use App\Models\Region;
use App\Support\Crud\WithDatatable;
use App\Support\Crud\WithDestroy;
use App\Support\Crud\WithForm;
use App\Support\Crud\WithStore;
use App\Support\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.core.administration.admins';

    protected string $datatable = AdminsDatatable::class;

    protected string $model = Admin::class;

    protected function storeAction(array $validated)
    {
        $roles = Arr::pull($validated, 'roles');
        $type  = $validated['type'] ?? 'admin';

        // إنشاء المشرف
        $admin = Admin::create($validated);
        $admin->syncRoles($roles);

        if ($type === 'admin') {
            // التعامل مع المناطق
            $regions = Arr::pull($validated, 'regions', []);
            foreach ($regions as $regionId) {
                AdminRegion::firstOrCreate([
                    'admin_id'  => $admin->id,
                    'region_id' => $regionId,
                ]);
            }
        }

        if ($type === 'client_admin') {
            // التعامل مع المشاريع
            $projects = Arr::pull($validated, 'client_projects', []);
            $admin->clientProjects()->sync($projects); // طريقة مباشرة بدلاً من foreach
        }
    }

    protected function updateAction(array $validated, Model $model)
    {
        $roles = Arr::pull($validated, 'roles');
        $type  = $validated['type'] ?? 'admin'; // افتراضي إذا لم يُرسل النوع

        // تحديث بيانات المشرف
        $model->update($validated);
        $model->syncRoles($roles);

        // حذف العلاقات السابقة إن وجدت
        if ($type === 'admin') {
            // معالجة المناطق
            $regions = Arr::pull($validated, 'regions', []);

            $existingRegions = AdminRegion::where('admin_id', $model->id)->pluck('region_id')->toArray();
            $regionsToAdd    = collect($regions)->diff($existingRegions);
            $regionsToRemove = collect($existingRegions)->diff($regions);

            foreach ($regionsToAdd as $region) {
                AdminRegion::create([
                    'admin_id'  => $model->id,
                    'region_id' => $region,
                ]);
            }

            AdminRegion::where('admin_id', $model->id)
                ->whereIn('region_id', $regionsToRemove)
                ->delete();

            // تنظيف المشاريع إذا كانت موجودة
            $model->clientProjects()->detach();
        }

        if ($type === 'client_admin') {
            // معالجة المشاريع
            $projects = Arr::pull($validated, 'client_projects', []);
            $model->clientProjects()->sync($projects);

            // تنظيف المناطق إذا كانت موجودة
            AdminRegion::where('admin_id', $model->id)->delete();
        }
    }

    protected function validationAction(): array
    {
        return app(AdminRequest::class)->validated();
    }

    protected function formData(?Model $model = null): array
    {
        $regions        = Region::pluck('title_ar', 'id');
        $clientProjects = ClientProject::pluck(app()->getLocale() == 'ar' ? 'name_ar' : 'name_en', 'id');

        return [
            'jsValidator'        => AdminRequest::class,
            'selected'           => $model?->getRoleNames(),
            'roles'              => toMap(Role::query()
                    ->where('guard_name', 'dashboard')
                    ->whereNotIn('name', ['super', 'admin', 'user'])
                    ->get(['id', 'name'])),
            'regions'            => $regions,
            'clientProjects'     => $clientProjects,
            'selectedProjectIds' => $model?->clientProjects()->pluck('id')->toArray() ?? [],
        ];
    }

    protected function change_status(Request $request)
    {
        $admin = Admin::where('id', $request->id)->first();

        if ($request->active == 'true') {
            $active = 1;
        } else {
            $active = 0;
        }

        $admin->active = $active;
        $admin->save();
        return response()->json(['sucess' => true]);
    }
}
