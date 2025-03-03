<?php

namespace App\Models;

use App\Support\Traits\HasPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Technician extends Authenticatable
{

    public const TECHNICIAN = 0;
    public const TRAINEE = 1;

    use HasApiTokens, HasPassword, HasFactory, HasRoles, Notifiable;
    protected $guard = 'technician';
    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

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

}
