<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicianWorkingDay extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function day()
    {
        return $this->hasOne(Day::class, 'id', 'day_id');
    }

    public function technician()
    {
        return $this->hasOne(Technician::class, 'id', 'technician_id');
    }

}
