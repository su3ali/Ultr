<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $fillable = [
        'day_id',
        'group_id',
        'service_id',
        'shift_no',
        'start_time',
        'end_time',
        'is_active',
    ];
    protected $casts = [
        'shift_no' => 'string',
    ];

    public function day()
    {
        return $this->belongsTo(Day::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // Add a scope to filter shifts by group_id and region_id
    public function scopeForGroupInRegion(Builder $query, $region_id)
    {
        $query->whereHas('group.region', function ($q) use ($region_id) {
            $q->where('region_id', $region_id);
        });
    }

}
