<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function scopeLateToServe($query, $now = null, $onlyToday = false)
    {
        $now   = $now ?: Carbon::now('Asia/Riyadh')->format('Y-m-d H:i:s');
        $today = Carbon::now('Asia/Riyadh')->toDateString();

        return $query->where('status_id', 1)
            ->whereHas('bookings', function ($q) use ($now, $onlyToday, $today) {
                $q->where('booking_status_id', 1)
                    ->when($onlyToday, fn($q) => $q->whereDate('date', $today))
                    ->whereRaw("STR_TO_DATE(CONCAT(bookings.date, ' ', bookings.time), '%Y-%m-%d %H:%i:%s') < ?", [$now])
                    ->whereHas('visits', fn($v) =>
                        $v->where('visits_status_id', 1)->where('created_at', '<', $now)
                    );
            });
    }

}
