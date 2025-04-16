<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientProjectServicePrice extends Model
{
    protected $fillable = [
        'client_project_id',
        'service_id',
        'price',
    ];

    public function clientProject()
    {
        return $this->belongsTo(ClientProject::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
