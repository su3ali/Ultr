<?php
namespace App\Services;

use App\Models\DashboardActivityLog;
use App\Models\Group;

class ActivityLogService
{
    public function getLogsForEntities(array $entities)
    {
        $filtered = collect($entities)->filter(fn($item) => ! empty($item['id']));

        // Fetch logs
        $logs = DashboardActivityLog::with('user')
            ->where(function ($q) use ($filtered) {
                foreach ($filtered as $item) {
                    $q->orWhere(function ($q2) use ($item) {
                        $q2->where('model_type', $item['type'])
                            ->where('model_id', $item['id']);
                    });
                }
            })
            ->latest()
            ->get();

        return $this->mapGroupNames($logs);
    }

    protected function mapGroupNames($logs)
    {
        // Collect all group_id changes
        $groupIds = collect($logs)->flatMap(function ($log) {
            $changes = json_decode($log->changes, true);
            return collect($changes)->map(function ($val, $key) {
                if ($key === 'group_id' && is_array($val)) {
                    return [$val['from'] ?? null, $val['to'] ?? null];
                }
                return [];
            })->flatten(1);
        })->filter()->unique()->values();

        $groups = Group::whereIn('id', $groupIds)->pluck('name_ar', 'id');

        // Replace group_id numbers with names
        return $logs->map(function ($log) use ($groups) {
            $changes = json_decode($log->changes, true);
            if (isset($changes['group_id'])) {
                $from = $changes['group_id']['from'] ?? null;
                $to   = $changes['group_id']['to'] ?? null;

                $changes['group_id'] = [
                    'from' => ['id' => $from, 'name_ar' => $groups[$from] ?? $from],
                    'to'   => ['id' => $to, 'name_ar' => $groups[$to] ?? $to],
                ];
                $log->changes = json_encode($changes, JSON_UNESCAPED_UNICODE);
            }
            return $log;
        });
    }
}
