<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'name_ar', 'is_active', 'start_time', 'end_time'];

    public static function getActiveDays()
    {
        return self::where('is_active', true)->get();
    }
    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }
    // In the Day model
    public function getTitleAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->name_ar : $this->name;
    }

    public function technicians()
    {
        return $this->belongsToMany(Technician::class, 'technician_working_days')->withTimestamps();
    }

}
