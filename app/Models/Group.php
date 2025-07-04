<?php
namespace App\Models;

use App\Models\Visit;
use App\Models\Technician;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;
    protected $guarded = [];

    public const ACTIVE   = 1;
    public const INACTIVE = 0;

    public function getNameAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->name_ar;
        } else {
            return $this->name_en;
        }
    }
    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_groups');
    }
    public function leader()
    {
        return $this->hasOne(Technician::class, 'id', 'technician_id');
    }
    public function technician()
    {
        return $this->belongsTo(Technician::class, 'technician_id');
    }

    public function scopeBusinessOnly($query)
    {
        return $query->whereHas('technician', function ($q) {
            $q->where('is_business', 1)
                ->where('is_trainee', Technician::TECHNICIAN);
        });
    }

    public function technician_groups()
    {
        return $this->hasMany(GroupTechnician::class);
    }
    public function regions()
    {
        return $this->hasMany(GroupRegion::class);
    }

    public function scopeGroupInRegionCategory(Builder $query, $region_id, $category_id)
    {

        $query->where('active', 1)->whereHas('regions', function ($qu) use ($region_id) {
            $qu->where('region_id', $region_id);
        })->whereHas('categories', function ($qu) use ($category_id) {
            $qu->whereIn('categories.id', $category_id);
        });
    }

    public function scopeActive(Builder $query)
    {
        $query->where('active', 1);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_groups');
    }

    // Defining the many-to-many relationship between Group and Region
    public function region()
    {
        return $this->belongsToMany(Region::class, 'group_regions', 'group_id', 'region_id');
    }

    public function project()
    {
        return $this->belongsTo(ClientProject::class, 'client_project_id');
    }

    public function branch()
    {
        return $this->belongsTo(ClientProjectBranch::class, 'branch_id');
    }

    public function scopeForProjectAndBranch($query, $projectId, $branchId)
    {
        return $query->where('client_project_id', $projectId)
            ->where('branch_id', $branchId);
    }

    

}
