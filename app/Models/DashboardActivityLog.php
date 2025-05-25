<?php
namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DashboardActivityLog extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'dashboard_activity_logs';

    protected $fillable = [
        'user_id',
        'action_type',
        'model_type',
        'model_id',
        'description',
        'changes',
        'meta',
        'ip_address',
    ];

    protected $casts = [
        'changes' => 'array',
        'meta'    => 'array',
    ];

    /**
     * The user who triggered the activity.
     */
    public function user()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * Get the polymorphic related model.
     */
    public function model()
    {
        return $this->morphTo();
    }
}
