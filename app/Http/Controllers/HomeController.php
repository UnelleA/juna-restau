<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controller\Auth;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
        switch (auth()->user()->type) {
            case 0:

                return view('admin');
            break;

            case 1:
                return view('client');
            break;

            case 2:
                return view('dashboard');
            break;

            case 3:
                return view('livreur');
            break;
            default:
            return view('login');
            }
    }
}
