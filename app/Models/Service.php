<?php
namespace App\Models;

use App\Models\BusinessProject\ClientProject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $appends = ['count_group'];

    public function getTitleAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->title_ar; // Assuming 'title_ar' is the Arabic title
        } else {
            return $this->title_en; // Assuming 'title_en' is the English title
        }
    }
    public function getDescriptionAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->description_ar;
        } else {
            return $this->description_en;
        }
    }
    public function getTer_condAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->ter_cond_ar;
        } else {
            return $this->ter_cond_en;
        }
    }

    public function serviceImages()
    {
        return $this->hasMany(ServiceImages::class, 'service_id', 'id');
    }

    public function BookingSetting()
    {
        return $this->hasOne(BookingSetting::class, 'service_id', 'id');
    }

    public function measurement()
    {
        return $this->hasOne(Measurement::class, 'id', 'measurement_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function getCountGroupAttribute()
    {
        return $this->category?->groups?->count();
    }

    public function icons()
    {
        return $this->belongsToMany(Icon::class, 'service_icons');
    }

    public function rates()
    {
        return $this->hasMany(RateService::class, 'service_id', 'id');
    }

    public function projectPrices()
    {
        return $this->hasMany(ClientProjectServicePrice::class);
    }

    public function clientProjects()
    {
        return $this->belongsToMany(ClientProject::class, 'client_project_service_prices')
            ->withPivot('price')
            ->withTimestamps();
    }

}
