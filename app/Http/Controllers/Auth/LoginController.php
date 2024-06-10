<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->state == 0) {
            $this->logout($request);
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    // This is where we are providing the error message.
                    $this->username() => 'This account deactivated contact your admin',
                ]);
        } else {
            Session::put('lang', $user->lang);
            Auth::logoutOtherDevices(request('password'));
        }
    }

    protected function redirectPath()
    {
        return RouteServiceProvider::HOME;
    }

    protected function redirectTo()
    {

        Session::put('lang', auth()->user()->lang);
        return RouteServiceProvider::HOME;
        // if (in_array(auth()->user()->type, ['SuperAdmin', 'Admin', 'Manager'])) {
        //     return '/dashboard';
        // } else {
        //     return '/pos';
        // }
    }

    public function username()
    {
        return 'uname';
    }
}
