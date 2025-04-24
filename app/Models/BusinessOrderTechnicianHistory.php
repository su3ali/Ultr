<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessOrderTechnicianHistory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'order_id',
        'technician_id',
        'group_id',
        'start_time',
        'end_time',
        'notes',
    ];

    public function order()
    {
        return $this->belongsTo(BusinessOrder::class, 'order_id');
    }

    public function technician()
    {
        return $this->belongsTo(Technician::class, 'technician_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}
