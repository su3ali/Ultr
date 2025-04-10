<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderRescheduleHistory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function bookingStatus()
    {
        return $this->belongsTo(BookingStatus::class);
    }

    public function userAddress()
    {
        return $this->belongsTo(UserAddress::class);
    }

    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }

    public function visitStatus()
    {
        return $this->belongsTo(VisitStatus::class);
    }

    public function assignedGroup()
    {
        return $this->belongsTo(Group::class, 'assign_to_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function cancelReason()
    {
        return $this->belongsTo(ReasonCancel::class, 'reason_cancel_id');
    }

}
