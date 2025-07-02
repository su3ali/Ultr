<?php
namespace App\Models;

use App\Models\BusinessProject\ClientProject;
use App\Support\Traits\HasPassword;
use App\Support\Traits\WithBoot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasApiTokens, WithBoot, HasPassword, HasFactory, HasRoles, Notifiable;
    protected $guard = 'dashboard';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'active',
        'fcm_token',
        'client_project_id',
        'type',
        'api_token',

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
        'type'              => 'string',

    ];

    public function regions()
    {
        return $this->hasMany(AdminRegion::class);
    }

    public function clientProject()
    {
        return $this->belongsTo(ClientProject::class);
    }

    public function clientProjects()
    {
        return $this->belongsToMany(ClientProject::class, 'admin_client_project')
            ->select('client_projects.id', 'client_projects.name_ar');
    }

}
