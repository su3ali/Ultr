<?php

namespace App\Models;

<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> 56de7c2d5ebf6136d8cbbd14ced17475edfe6130
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
<<<<<<< HEAD
=======
    use HasFactory;

>>>>>>> 56de7c2d5ebf6136d8cbbd14ced17475edfe6130
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
<<<<<<< HEAD
=======

    public function scopeForGroupInRegion(Builder $query, $region_id)
    {

        $query->whereHas('group.region', function ($q) use ($region_id) {
            $q->where('region_id', $region_id);
        });

    }
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_regions', 'group_id', 'region_id');
    }

>>>>>>> 56de7c2d5ebf6136d8cbbd14ced17475edfe6130
}
