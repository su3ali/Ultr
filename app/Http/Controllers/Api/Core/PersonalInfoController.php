<?php
namespace App\Http\Controllers\Api\Core;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Support\Api\ApiResponse;
use Illuminate\Http\Request;

class PersonalInfoController extends Controller
{
    use ApiResponse;

    public function __construct()
    {
        $this->middleware('localization');
    }

    protected function getUserInfo()
    {
        $user               = UserResource::make(auth('sanctum')->user());
        $this->body['user'] = $user;
        return self::apiResponse(200, null, $this->body);
    }

    protected function updateUserInfo(Request $request)
    {
        $user = auth('sanctum')->user();
        $user = User::query()->where('id', $user->id)->first();
        $request->validate([
            'name'  => 'nullable|min:3|max:100',
            'phone' => 'required|numeric|unique:users,phone,' . $user->id,
            'email' => 'nullable|email|unique:users,email,' . $user->id,
        ]);
        $user->update([
            'first_name' => $request->name,
            'phone'      => $request->phone,
            'email'      => $request->email,
        ]);
        $this->body['user'] = $user;
        return self::apiResponse(200, null, $this->body);
    }

    public function updateFcmToken(Request $request)
    {
        $request->validate([
            'fcm_token'       => 'required|string|max:255',
            'device_name'     => 'nullable|string|max:255',
            'os_type'         => 'nullable|string|max:255',
            'app_version'     => 'nullable|string|max:255',
            'device_model'    => 'nullable|string|max:255',
            'os_version'      => 'nullable|string|max:255',
            'additional_info' => 'nullable|string|max:255',
        ]);

        $user = auth('sanctum')->user();

        // Update user fcm_token
        $user->update([
            'fcm_token' => $request->fcm_token,
        ]);

        // Update or create user_details
        $user->detail()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'device_name'     => $request->device_name,
                'os_type'         => $request->os_type,
                'app_version'     => $request->app_version,
                'device_model'    => $request->device_model,
                'os_version'      => $request->os_version,
                'additional_info' => $request->additional_info,
                'last_opened_at'  => now('Asia/Riyadh'),
            ]
        );

        $this->body['user'] = UserResource::make($user);

        return self::apiResponse(200, null, $this->body);
    }

}
