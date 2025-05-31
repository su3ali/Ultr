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
            'fcm_token' => 'required|string|max:255',
        ]);

        $user = auth('sanctum')->user();

        $user->update([
            'fcm_token' => $request->fcm_token,
        ]);

        $this->body['user'] = UserResource::make($user);

        return self::apiResponse(200, null, $this->body);
    }

}
