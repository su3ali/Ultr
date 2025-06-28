<?php
namespace App\Models;

use App\Models\Admin;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class RefundLog extends Model
{
    protected $fillable = [
        'user_id',
        'order_id',
        'by_admin',
        'amount',
        'method',
        'reason',
        'reference',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'by_admin');
    }
}
