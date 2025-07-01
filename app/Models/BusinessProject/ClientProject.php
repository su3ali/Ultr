<?php
namespace App\Models\BusinessProject;

use App\Models\Admin;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClientProjectServicePrice;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BusinessProject\ClientProjectBranch;

class ClientProject extends Model
{
    use SoftDeletes;

    protected $fillable = ['name_ar', 'name_en', 'code', 'description', 'active', 'created_by', 'updated_by'];

    public function getTitleAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->name_ar;
        } else {
            return $this->name_en;
        }
    }

    public function branches()
    {
        return $this->hasMany(ClientProjectBranch::class);
    }

    public function servicePrices()
    {
        return $this->hasMany(ClientProjectServicePrice::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'client_project_service_prices')
            ->withPivot('price')
            ->withTimestamps();
    }

    public function admins()
    {
        return $this->belongsToMany(Admin::class, 'admin_client_project');
    }

}
