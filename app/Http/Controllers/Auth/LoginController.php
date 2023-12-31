<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function authenticated(Request $request, $user)
    {
        if ($user->akses == 'kepala_sekolah') {
            return redirect()->route('kepala_sekolah.beranda');
        } else if ($user->akses == 'admin') {
            activity()->causedBy(Auth::user())
                ->event('login')
                ->log('user admin ' . auth()->user()->name . ' melakukan login');
            return redirect()->route('kepala_sekolah.beranda');
        } 
        else if ($user->akses == 'operator') {
            activity()->causedBy(Auth::user())
                ->event('login')
                ->log('user operator ' . auth()->user()->name . ' melakukan login');
            return redirect()->route('operator.beranda');
        } elseif ($user->akses == 'wali') {
            activity()->causedBy(Auth::user())
                ->event('login')
                ->log('user wali ' . auth()->user()->name . ' melakukan login');
            return redirect()->route('wali.beranda');
        } elseif ($user->akses == 'walikelas') {
            activity()->causedBy(Auth::user())
                ->event('login')
                ->log('user walikelas ' . auth()->user()->name . ' melakukan login');
            return redirect()->route('walikelas.beranda');
        } else {
            Auth::logout();
            flash('Anda tidak memiliki hak akses')->error();
            return redirect()->route('login');
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login_niceadmin');
    }

    public function loginUrl(Request $request)
    {
        if (!$request->hasValidSignature()) {
            abort(401);
        }
        $user = Auth::loginUsingId($request->user_id);
        return redirect($request->url);
    }
}
