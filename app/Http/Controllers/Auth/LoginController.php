<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\LoginHistory;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Notifications\Notification;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Notifications\NewLoginFromDifferentLocation;

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
    }

    public function authenticated(Request $request, User $user)
    {
        $agent = new Agent();

        $previousLoginHistory = LoginHistory::where('user_id', $user->id)
            ->orderBy('id')
            ->first();

        $latestLoginHistory = LoginHistory::create([
            'user_id' => $user->id,
            'ip_address' => $request->getClientIp(),
            'device' => $agent->device(),
            'operating_system' => $agent->platform() . ' v' . str_replace('_', '.', $agent->version($agent->platform())),
            'browser' => $agent->browser(),
            'location' => 'New York, NY, USA'
        ]);
    }
}
