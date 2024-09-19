<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingSetting extends Model
{
    use HasFactory;
    protected $guarded = [];



    public function service(){
        return $this->hasOne(Service::class, 'id','service_id');
    }

    public function regions(){
        return $this->hasMany(BookingSettingRegion::class);
    }

    
    public function scopeBookingSetting(Builder $query, $region_id, $service_id)
    {
        $query->whereHas('regions', function ($q) use ($region_id) {
            $q->where('region_id', $region_id);
        })->where('service_id', $service_id);
    }
}
