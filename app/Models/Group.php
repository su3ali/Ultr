<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $guarded = [];
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
    protected function leader()
    {
        return $this->hasOne(Technician::class, 'id', 'technician_id');
    }
    public function technicians()
    {
        return $this->hasMany(Technician::class);
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
}
