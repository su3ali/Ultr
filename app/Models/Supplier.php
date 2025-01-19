<?php
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use SoftDeletes;

    use HasFactory;
    protected $fillable = [
        'name_ar',
        'name_en',
        'email',
        'phone',
        'tax_number',
        'address',
        'contact_person',
        'status',
    ];

    protected $dates = ['deleted_at'];

    // Dynamic Accessor for Localized Name
    public function getNameAttribute()
    {
        $locale = app()->getLocale(); // Retrieve the current application locale
        return $locale === 'ar' ? $this->name_ar : $this->name_en;
    }
}
