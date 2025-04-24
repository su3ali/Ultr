<?php
namespace App\Models\BusinessProject;

use App\Models\BusinessProject\ClientProject;
use App\Models\BusinessProject\ClientProjectBranchFloor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientProjectBranch extends Model
{
    use SoftDeletes;

    protected $fillable = ['client_project_id', 'name_ar', 'name_en', 'code', 'location', 'latitude', 'longitude', 'phone', 'email', 'notes', 'active'];

    public function project()
    {
        return $this->belongsTo(ClientProject::class, 'client_project_id');
    }

    public function floors()
    {
        return $this->hasMany(ClientProjectBranchFloor::class, 'branch_id');
    }
}
