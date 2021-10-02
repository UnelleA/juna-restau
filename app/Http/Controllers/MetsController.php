<?php

namespace App\Http\Controllers;

use App\Models\met;
use Gloudemans\Shoppingcart\Facades\Cart;

class MetsController extends Controller
{
    public function index()
    {
        $mets = met::inRandomOrder()->take(6)->get();
        // dd($mets);
        return view('mets.index')->with('mets', $mets);
    }

    public function show($title)
    {
        $met = met::where('title', $title)->first();

       
        return view('mets.show')->with('met', $met);
    }

    public function menu()
    {
        return view('mets.menu');
    }
}
