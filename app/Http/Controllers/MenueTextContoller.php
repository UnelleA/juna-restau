<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use Illuminate\Http\Request;

class MenueTextContoller extends Controller
{
    public function index($slug){
        // dd($slug);
        $company = Compte::where('slug', $slug)->firstOrFail();
        dd($company);
        if(!$company->status){

            return view('is_not_active', compact('company'));
        }else{
        dd($slug);

            $mets = $company->mets()->inRandomOrder()->paginate(6);
            // $categories = Category::all();
            $categories = $company ->categories;

            // dd($mets);
            return view('new.index')->with('mets', $mets)->with('categories', $categories)->with('company', $slug);
    }
    }
}
