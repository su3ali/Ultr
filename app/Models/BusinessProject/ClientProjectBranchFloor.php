<?php
namespace App\Models\BusinessProject;

use App\Models\BusinessProject\ClientProjectBranch;
use App\Models\Technician;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientProjectBranchFloor extends Model
{
    use SoftDeletes;
    protected $casts = [
        'active' => 'boolean',
    ];

    protected $fillable = ['branch_id', 'name_ar', 'name_en', 'floor_number', 'type', 'notes', 'active'];

    public function branch()
    {
        return $this->belongsTo(ClientProjectBranch::class, 'branch_id');
    }

    public function technicians()
    {
        return $this->belongsToMany(
            Technician::class,
            'technician_branch_floor',
            'floor_id',
            'technician_id'
        );
    }

}
