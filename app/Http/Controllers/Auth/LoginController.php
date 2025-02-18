<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    // /*
    // |--------------------------------------------------------------------------
    // | Login Controller
    // |--------------------------------------------------------------------------
    // |
    // | This controller handles authenticating users for the application and
    // | redirecting them to your home screen. The controller uses a trait
    // | to conveniently provide its functionality to your applications.
    // |
    // */

    // use AuthenticatesUsers;

    // /**
    //  * Where to redirect users after login.
    //  *
    //  * @var string
    //  */
    // protected $redirectTo = RouteServiceProvider::HOME;

    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    use AuthenticatesUsers;
protected $redirectTo;

    public function redirectTo()
    {
        $route= session('redirectback') ?? '/dashboard';
         $this->redirectTo=$route;
        return $this->redirectTo;
        // switch (Auth::user()->type) {
        // case 0:
        //     $this->redirectTo = '/dashboard';
        //     return $this->redirectTo;
        // break;

        // case 1:
        //     $this->redirectTo = '/dashboard';
        //     return $this->redirectTo;
        // break;

        // case 2:
        //     $this->redirectTo = '/dashboard';
        //     return $this->redirectTo;
        // break;

        // case 3:
        //     $this->redirectTo = '/dashboard';
        //     return $this->redirectTo;
        // break;
        // default:
        // $this->redirectTo = '/login';
        // return $this->redirectTo;
        //}
      }
    }


