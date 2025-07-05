<?php
namespace App\Models;

use App\Models\Booking;
use App\Models\Group;
use App\Models\ReasonCancel;
use App\Models\VisitsStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    protected $guarded = [];

    public const WAITING          = 1;
    public const ON_WAY           = 2;
    public const START_WORKING    = 3;
    public const COMPLETE_REQUEST = 4;
    public const COMPLETED        = 5;
    public const CANCELED         = 6;

    public function group()
    {
        return $this->belongsTo(Group::class, 'assign_to_id');
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    public function status()
    {
        return $this->belongsTo(VisitsStatus::class, 'visits_status_id');
    }
    public function cancelReason()
    {

        return $this->belongsTo(ReasonCancel::class, 'reason_cancel_id');
    }

    public function scopeActiveVisits(Builder $query)
    {
        return $query->whereNotIn('visits_status_id', [5, 6]);
    }
}
