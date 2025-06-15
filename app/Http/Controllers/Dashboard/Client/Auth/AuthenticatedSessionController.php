<?php
namespace App\Http\Controllers\Dashboard\Client\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function loginForm()
    {
        $pageConfigs = ['bodyCustomClass' => 'login-bg', 'isCustomizer' => false];

        return view('dashboard.client.auth.login', ['pageConfigs' => $pageConfigs]);
        
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $remember_me = $request->has('remember_me');

        if (! Auth::guard('client_admin')->attempt([
            'email'    => $request->email,
            'password' => $request->password,
        ], $remember_me)) {
            return back()
                ->with('message', __('dash.logged_in_faild_data'))
                ->with('class', 'alert alert-danger');
        }

        return redirect()->route('client.dashboard')
            ->with('message', __('dash.logged_in_successfully'))
            ->with('class', 'alert alert-success');
    }

    public function destroy(Request $request)
    {
        auth('client_admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/client/login');
    }
}
