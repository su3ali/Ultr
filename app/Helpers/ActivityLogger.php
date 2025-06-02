<?php
namespace App\Helpers;

use App\Models\DashboardActivityLog; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ActivityLogger
{
    /**
     * Log a dashboard activity.
     *
     * @param string $actionType
     * @param Model|null $model
     * @param string|null $description
     * @param array|null $changes
     * @param int|null $userId
     * @param array $meta
     * @return void
     */
    public static function log(
        string $actionType,
        Model $model = null,
        string $description = null,
        array $changes = null,
        int $userId = null,
        array $meta = []
    ): void {
        DashboardActivityLog::create([
            'user_id'     => $userId ?? Auth::id(),
            'action_type' => $actionType,
            'model_type'  => $model ? get_class($model) : null,
            'model_id'    => $model?->id,
            'description' => $description,
            'changes'     => $changes ? json_encode($changes, JSON_UNESCAPED_UNICODE) : null,
            'meta'        => ! empty($meta) ? json_encode($meta, JSON_UNESCAPED_UNICODE) : null,
            'ip_address'  => request()->ip(),
        ]);
    }
}
