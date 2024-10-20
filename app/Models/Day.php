<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'name_ar', 'is_active', 'start_time', 'end_time'];
    public function getTitleAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->name_ar;
        } else {
            return $this->name;
        }
    }

    public static function getActiveDays()
    {
        return self::where('is_active', true)->get();
    }
    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }
}
