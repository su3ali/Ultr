<?php
namespace App\Models;

use App\Models\BusinessOrderStatus;
use App\Models\BusinessOrderTechnicianHistory;
use App\Models\CarClient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessOrder extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'car_id',
        'category_id',
        'service_id',
        'status_id',
        'assign_to_id',
        'reason_cancel_id',
        'payment_method_id',
        'client_project_id',
        'branch_id',
        'floor_id',
        'total',
        'discount',
        'sub_total',
        'partial_amount',
        'notes',

    ];
    public const STATUS_PENDING     = 1;
    public const STATUS_IN_PROGRESS = 2;
    public const STATUS_COMPLETED   = 3;
    public const STATUS_CANCELED    = 4;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(CarClient::class);
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
        return $this->belongsTo(BusinessOrderStatus::class);
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

    public function project()
    {
        return $this->belongsTo(ClientProject::class, 'client_project_id');
    }

    public function branch()
    {
        return $this->belongsTo(ClientProjectBranch::class, 'branch_id');
    }

    public function floor()
    {
        return $this->belongsTo(ClientProjectBranchFloor::class, 'floor_id');
    }

    public function technicianHistories()
    {
        return $this->hasMany(BusinessOrderTechnicianHistory::class, 'order_id');
    }

}
