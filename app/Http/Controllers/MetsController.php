<?php

namespace App\Http\Controllers;

use App\Models\met;
use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;

class MetsController extends Controller
{
    public function index()
    {
        $mets = met::inRandomOrder()->take(6)->get();
        $categories=Category::all();
        // dd($mets);
        return view('mets.index')->with('mets', $mets)->with('categories', $categories);
    }

    public function show($title)
    {
        $met = met::where('title', $title)->first();


        return view('mets.show')->with('met', $met);
    }

}
