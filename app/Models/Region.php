<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'polygon_coordinates' => 'array',
    ];

    public function getTitleAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->title_ar;
        } else {
            return $this->title_en;
        }
    }

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_regions', 'region_id', 'group_id');
    }

}
