<?php
namespace App\Models;

use App\Models\BusinessOrderTechnicianHistory;
use App\Models\BusinessProject\ClientProject;
use App\Models\BusinessProject\ClientProjectBranchFloor;
use App\Models\Day;
use App\Models\Models\BusinessProject\ClientProjectBranch;
use App\Support\Traits\HasPassword;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Technician extends Authenticatable
{

    public const TECHNICIAN = 0;
    public const TRAINEE    = 1;

    use HasApiTokens, HasPassword, HasFactory, HasRoles, Notifiable;
    protected $guard   = 'technician';
    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function scopeWorkingToday($query)
    {
        $today = Carbon::now('Asia/Riyadh')->dayOfWeek;

        return $query->whereHas('workingDays', function ($q) use ($today) {
            $q->where('day_id', $today);
        });
    }

    public function scopeOffToday($query)
    {
        $today = Carbon::now('Asia/Riyadh')->dayOfWeek;

        return $query->whereDoesntHave('workingDays', function ($q) use ($today) {
            $q->where('day_id', $today);
        });
    }

    public function specialization()
    {
        return $this->hasOne(Specialization::class, 'id', 'spec_id');
    }

    public function group()
    {
        return $this->hasOne(Group::class, 'id', 'group_id');
    }

    public function rates()
    {
        return $this->hasMany(RateTechnician::class, 'technician_id', 'id');
    }

    public function traineeRates()
    {
        return $this->hasMany(RateTrainee::class, 'trainee_id', 'id');
    }

    public function workingDays()
    {
        return $this->hasMany(TechnicianWorkingDay::class, 'technician_id', 'id');
    }

    public function clientProject()
    {
        return $this->belongsTo(ClientProject::class, 'client_project_id');
    }

    public function branch()
    {
        return $this->belongsTo(ClientProjectBranch::class, 'branch_id');
    }

    public function floors()
    {
        return $this->belongsToMany(
            ClientProjectBranchFloor::class,
            'technician_branch_floor',
            'technician_id',
            'floor_id'
        )->withTimestamps();
    }

    public function orderHistories()
    {
        return $this->hasMany(BusinessOrderTechnicianHistory::class, 'technician_id');
    }

    public function scopeBusiness($query)
    {
        return $query->where('is_business', 1);
    }

    public function relatedGroups()
    {
        return Group::where('client_project_id', $this->client_project_id)
            ->where('branch_id', $this->branch_id);
    }

    public function getTodayDayId()
    {
        $carbonDayOfWeek = Carbon::now('Asia/Riyadh')->dayOfWeek;

        $day = Day::where('is_active', 1)
            ->where('day_of_week', $carbonDayOfWeek)
            ->first();

        return $day ? $day->id : null;
    }

}
