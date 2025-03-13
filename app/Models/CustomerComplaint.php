<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerComplaint extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function customerComplaintImages()
    {
        return $this->hasMany(CustomerComplaintImage::class, 'customer_complaints_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function bookings()
    {
        return $this->hasManyThrough(Booking::class, Order::class, 'id', 'order_id', 'order_id', 'id');
    }

    public function visits()
    {
        return $this->hasManyThrough(Visit::class, Booking::class, 'order_id', 'booking_id', 'order_id', 'id');
    }
}
