<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComplaintType extends Model
{
    use HasFactory;
    use HasFactory, SoftDeletes;
    protected $fillable = ['name_en', 'name_ar', 'description_en', 'description_ar'];

    public function getNameAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->name_ar : $this->name_en;
        return app()->getLocale() === 'ar' ? $this->description_ar : $this->description_en;
    }

}
