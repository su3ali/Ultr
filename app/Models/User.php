<?php
namespace App\Models;

use App\Models\CarClient;
use App\Models\UserDetail;
use App\Support\Traits\HasPassword;
use App\Support\Traits\WithBoot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, WithBoot, HasPassword, HasFactory, HasRoles, Notifiable;
    protected $guard   = 'user';
    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
    ];
    // User has many Orders
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'user_id');
    }
    public function couponUsers()
    {
        return $this->hasMany(CouponUser::class, 'user_id');
    }
    public function carts()
    {
        return $this->hasMany(Cart::class, 'user_id');
    }

    public function address()
    {
        return $this->hasMany(UserAddresses::class, 'user_id')->where('is_default', 1);
    }

    public function cars()
    {
        return $this->hasMany(CarClient::class, 'user_id');
    }

    public function detail()
    {
        return $this->hasOne(UserDetail::class);
    }

}
