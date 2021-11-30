<?php

namespace App\Http\Controllers\Auth;

namespace App\Http\Controller\Auth;

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd('ok');
        switch (auth()->user()->type) {
            case 0:

                return view('dashboard.index');
            break;

            case 1:
                return view('dashboard.index');
            break;

            case 2:
                return view('dashboard.index');
            break;

            case 3:
                return view('dashboard.index');
            break;
            default:
            return view('login');
            }
    }
}
