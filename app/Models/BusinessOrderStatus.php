<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessOrderStatus extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'active',
    ];

    public function getNameAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->name_ar;
        } else {
            return $this->name_en;
        }
    }
}
