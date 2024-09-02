<?php

namespace App\Http\Controllers\Api\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\auth\AdminResource;
use App\Support\Api\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;


class AuthController extends Controller
{
    use ApiResponse;

    public function __construct()
    {
        $this->middleware('localization');
    }

    /**
     * @throws \Exception
     */
    public function login(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => ['required', Password::min(4)],
        ], $request->all());

        $cred = ['email' => $validated['email'], 'password' => $validated['password']];

        if (Auth::guard('dashboard')->attempt($cred)) {

            $admin = Auth::guard('dashboard')->user();
            $admin->update([
                'fcm_token' => $request->fcm_token
            ]);
            if(auth('sanctum')->check()){
                $admin->tokens()->delete();
            }
        
           
            $this->message = __('api.login successfully');
            $this->body['admin'] = AdminResource::make($admin);
            $this->body['accessToken'] = $admin->createToken('admin-token', ['admin'])->plainTextToken;
            return self::apiResponse(200, $this->message, $this->body);
        } else {
            $this->message = __('api.auth failed');
            return self::apiResponse(400, $this->message, $this->body);
        }
    }


    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        auth()->user()->update([
            'fcm_token' => null
        ]);
        $this->message = __('api.Logged out');
        return self::apiResponse(200, $this->message, $this->body);
    }

}
