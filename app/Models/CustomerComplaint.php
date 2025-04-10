<?php
namespace App\Models;

use App\Models\Booking;
use App\Models\ComplaintType;
use App\Models\CustomerComplaintImage;
use App\Models\CustomerComplaintReply;
use App\Models\CustomerComplaintStatus;
use App\Models\Order;
use App\Models\User;
use App\Models\Visit;
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

    public function status()
    {
        return $this->belongsTo(CustomerComplaintStatus::class, 'customer_complaints_status_id');
    }

    public function complaintType()
    {
        return $this->belongsTo(ComplaintType::class, 'complaint_type_id');
    }

    public function complaintReply()
    {
        return $this->hasMany(CustomerComplaintReply::class, 'customer_complaint_id');
    }
}
