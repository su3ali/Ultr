<?php
namespace App\Http\Controllers\Dashboard\Client\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Auth\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticatedSessionController extends Controller
{
    public function loginForm()
    {
        $pageConfigs = ['bodyCustomClass' => 'login-bg', 'isCustomizer' => false];

        return view('dashboard.client.auth.login', ['pageConfigs' => $pageConfigs]);

    }

    public function doLogin(LoginRequest $request)
    {
        $remember_me = $request->has('remember_me');

        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
        ];

        $isApi = $request->expectsJson() || $request->wantsJson();

        $user = Admin::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            if ($isApi) {
                return response()->json([
                    'message' => __('dash.logged_in_faild_data'),
                ], 401);
            }

            return back()
                ->with('message', __('dash.logged_in_faild_data'))
                ->with('class', 'alert alert-danger');
        }

        Auth::guard('dashboard')->login($user, $remember_me);

        if ($isApi) {
            $token = $user->createToken('client_admin_api')->plainTextToken;
            return response()->json([
                'message' => __('dash.logged_in_successfully'),
                'token'   => $token,
                'user'    => $user,
            ]);
        }

        return redirect()->intended(route('dashboard.home'));
    }

    // public function destroy(Request $request)
    // {
    //     auth('client_admin')->logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return redirect('/client/login');
    // }

    public function destroy(Request $request)
    {
        auth('dashboard')->logout();
        auth('client_admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin');
    }
}
