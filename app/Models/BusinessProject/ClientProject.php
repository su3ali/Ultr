<?php
namespace App\Models\BusinessProject;

use App\Models\BusinessProject\ClientProjectBranch;
use App\Models\ClientProjectServicePrice;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class   ClientProject extends Model
{
    use SoftDeletes;

    protected $fillable = ['name_ar', 'name_en', 'code', 'description', 'active', 'created_by', 'updated_by'];

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

}
