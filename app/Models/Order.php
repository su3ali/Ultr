<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Order belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function service()
    {
        return $this->hasOne(Service::class, 'id', 'service_id');
    }

    public function orderService()
    {
        return $this->hasOne(OrderService::class, 'id', 'order_id');
    }

    public function contract()
    {
        return $this->hasOne(Contract::class, 'id', 'service_id');
    }

    public function status()
    {
        return $this->hasOne(OrderStatus::class, 'id', 'status_id');
    }

    public function userAddress()
    {
        return $this->hasOne(UserAddresses::class, 'id', 'user_address_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'order_id', 'id');
    }
    public function services()
    {
        return $this->belongsToMany(Service::class, 'order_services')->withPivot(['price', 'quantity'])->withTrashed();
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'order_id', 'id')->latest();
    }

    public function userCar()
    {
        return $this->hasOne(CarClient::class, 'id', 'car_user_id')->withTrashed();
    }

    public function orderServices()
    {
        return $this->hasMany(OrderService::class, 'order_id'); // Relating orders to order_services
    }

}
