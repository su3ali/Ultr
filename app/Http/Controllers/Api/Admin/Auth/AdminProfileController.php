<?php

namespace App\Http\Controllers\Api\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use App\Models\Technician;
use App\Support\Api\ApiResponse;
use App\Traits\SMSTrait;
use Illuminate\Notifications\DatabaseNotification;

class AdminProfileController extends Controller
{
    use ApiResponse;
    use SMSTrait;

    public function __construct()
    {
        $this->middleware('localization');
    }


    protected function getNotification()
    {
        $admin = auth('sanctum')->user();

        $notifications = DatabaseNotification::where('notifiable_type', Technician::class)->get();
        $this->body['notification'] = NotificationResource::collection($notifications);
        return self::apiResponse(200, null, $this->body);
    }
}
