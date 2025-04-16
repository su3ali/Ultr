<?php
namespace App\Models;

use App\Models\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessOrder extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'category_id',
        'service_id',
        'status_id',
        'assign_to_id',
        'reason_cancel_id',
        'payment_method_id',
        'total',
        'discount',
        'sub_total',
        'partial_amount',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'assign_to_id');
    }

    public function reasonCancel()
    {
        return $this->belongsTo(ReasonCancel::class, 'reason_cancel_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
