<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Compte;
use App\Models\met;

class MetsController extends Controller
{
    public function index($slug)
    {
        // dd($slug);
        $company = Compte::where('slug', $slug)->firstOrFail();
        // dd($company);
        if(!$company->status){
            return view('is_not_active', compact('company'));
        }else{
            $mets = $company->mets()->paginate(6);
            $categories = $company ->categories;
            return view('mets.index')->with('mets', $mets)->with('categories', $categories)->with('slug', $slug);
        }



    }

    public function show($slug, $category)
    {
        // dd($slug);
        $company = Compte::where('slug', $slug)->firstOrFail();
        // dd($company);
        if(!$company->status){
            return view('is_not_active', compact('company'));
        }else{
            $mets = $company->mets()->where('category_id', $category)->paginate(6);
            $categories = $company ->categories;
            return view('mets.index')->with('mets', $mets)->with('categories', $categories)->with('slug', $slug);
        }



    }


    /* PAGINATION */
    function indexPaginate($slug)
    {

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
