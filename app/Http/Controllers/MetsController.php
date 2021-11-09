<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Compte;
use App\Models\met;

class MetsController extends Controller
{
    public function index($slug)
    {
        $company = Compte::where('slug', $slug)->firstOrFail();
        if(!$company->status){
            return view('is_not_active', compact('company'));
        }else{
            $mets = $company->mets()->inRandomOrder()->paginate(6);

            // $mets = $company->mets()->inRandomOrder()->take(20)->get();
            $categories = $company ->categories;
            return view('mets.index')->with('mets', $mets)->with('categories', $categories);
        }

    }


    /* PAGINATION */
    function indexPaginate($slug)
    {

        $company = Compte::where('slug', $slug)->firstOrFail();
        if(!$company->status){
            return view('is_not_active', compact('company'));
        }else{
            $mets = $company->mets()->inRandomOrder()->paginate(6);
            // $categories = Category::all();
            $categories = $company ->categories;

            // dd($mets);
            return view('new.index')->with('mets', $mets)->with('categories', $categories)->with('company', $slug);
        }

  /*   $data = DB::table('posts')->paginate(5);
     return view('pagination', compact('data'));*/
    }

    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
        $company = Compte::where('slug', $slug)->firstOrFail();
        if(!$company->status){
            return view('is_not_active', compact('company'));
        }else{
            $mets = $company->mets()->inRandomOrder()->paginate(6);
            // $categories = Category::all();
            $categories = $company ->categories;
            // dd($mets);
            return view('new.pagination_data',compact('mets','categories'))->render();
        }

     }
    }

}
