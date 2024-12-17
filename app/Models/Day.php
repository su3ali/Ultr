<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $fillable = ['name', 'is_active', 'start_time', 'end_time'];
=======
    protected $fillable = ['name', 'name_ar', 'is_active', 'start_time', 'end_time'];
>>>>>>> 56de7c2d5ebf6136d8cbbd14ced17475edfe6130

    public static function getActiveDays()
    {
        return self::where('is_active', true)->get();
    }
    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }
<<<<<<< HEAD
=======
    // In the Day model
    public function getTitleAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->name_ar : $this->name;
    }

>>>>>>> 56de7c2d5ebf6136d8cbbd14ced17475edfe6130
}
