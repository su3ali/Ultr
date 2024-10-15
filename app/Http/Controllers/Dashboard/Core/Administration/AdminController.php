<?php

namespace App\Http\Controllers\Dashboard\Core\Administration;

use App\Datatables\Dashboard\Core\Administration\AdminsDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Administration\AdminRequest;
use App\Models\Admin;
use App\Models\AdminRegion;
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

        $regions = Arr::pull($validated, 'regions');
        $regionsCollection = collect($regions);

        $model = Admin::create($validated);
        foreach ($regionsCollection as $region) {
            $exists = AdminRegion::where('region_id', $region)
                ->where('admin_id', $model->id)
                ->exists();

            if (!$exists) {
                $adminRegion = AdminRegion::create([
                    'region_id' => $region,
                    'admin_id' => $model->id,
                ]);
            }
        }

        $model->syncRoles($roles);
    }

    protected function updateAction(array $validated, Model $model)
    {

        $roles = Arr::pull($validated, 'roles');
        $regions = Arr::pull($validated, 'regions');
        $regionsCollection = collect($regions);

        $model->update($validated);
        foreach ($regionsCollection as $region) {
            $exists = AdminRegion::where('region_id', $region)
                ->where('admin_id', $model->id)
                ->exists();

            if (!$exists) {
                $adminRegion = AdminRegion::create([
                    'region_id' => $region,
                    'admin_id' => $model->id,
                ]);
            }
        }
        $model->syncRoles($roles);
    }

    protected function validationAction(): array
    {
        return app(AdminRequest::class)->validated();
    }

    protected function formData(?Model $model = null): array
    {

        $regions = Region::pluck('title_ar', 'id');

        return [
            'jsValidator' => AdminRequest::class,
            'selected' => $model?->getRoleNames(),
            'roles' => toMap(Role::query()->where('guard_name', 'dashboard')
                    ->whereNotIn('name', ['super', 'admin', 'user'])
                    ->get(['id', 'name'])),
            'regions' => $regions,
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
