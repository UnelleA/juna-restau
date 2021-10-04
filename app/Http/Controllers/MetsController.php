<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Compte;
use App\Models\met;
use Gloudemans\Shoppingcart\Facades\Cart;

class MetsController extends Controller
{
    public function index($slug)
    {
        $company=Compte::where('slug', $slug)->firstOrFail();
        $mets = $company->mets()->inRandomOrder()->take(6)->get();
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
