<?php
namespace App\Models\BusinessProject;

use App\Models\BusinessProject\ClientProjectBranch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientProject extends Model
{
    use SoftDeletes;

    protected $fillable = ['name_ar', 'name_en', 'code', 'description', 'active', 'created_by', 'updated_by'];

    public function branches()
    {
        return $this->hasMany(ClientProjectBranch::class);
    }
}
