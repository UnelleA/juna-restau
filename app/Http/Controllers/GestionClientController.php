<?php

namespace App\Http\Controllers;

use App\Models\met;
use App\Models\Category;
use App\Models\Commande;
use Illuminate\Http\Request;

class GestionClientController extends Controller
{
    public function commande()
    {
        $commandes=Commande::where('compte_id',auth()->user()->compte->id)->get();
        return view('dashboard.gestion_client.commande', compact('commandes'));

    }

    public function livraison()
    {
        $commandes=Commande::where('compte_id',auth()->user()->compte->id)->get();
        return view('dashboard.gestion_client.livraison', compact('commandes'));

    }


    public function reservation()
    {
        return view('dashboard.gestion_client.reservation');
    }



    public function index()
    {
        $mets=met::all();
        $mets=met::where('compte_id',auth()->user()->compte->id)->get();

        return view('dashboard.menu.index', compact('mets'));
    }


    public function create()
    {
        $categories=Category::all();
        // dd($categories);
        return view('dashboard.menu.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data= $request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required',
            'category_id'=>'required',

     ]);

         $filename=time(). '.'.$request->image->extension();
         $image=$request->file('image')->storeAs(
             'images',
             $filename,
             'public'
         );
         $data['image']= $image;

        auth()->user()->compte->mets()->create($data);
        return redirect()->route('menu.index');
    }

    public function show(met $met)
    {
        return view('dashboard.menu.show', compact('met'));
    }

    public function edit( $menu)
    {
        $categories=Category::all();
        $met=met::findOrFail($menu);
        return view('dashboard.menu.edit', compact('met', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $tab= $request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'sometimes:image',
            'category_id'=>'required',
        ]);
        $met= met::findOrFail($id);
        if($request->image){
            $filename=time(). '.'.$request->image->extension();
            $image=$request->file('image')->storeAs(
                'images',
                $filename,
                'public'
            );
            $data['image']= $image;
        }

        $data['category_id']= $request->category_id;
        $data['title']= $request->title;
        $data['description']= $request->description;
        $data['price']= $request->price;
        $met->update($data);
        return redirect()->route('menu.index');
    }

    public function destroy(Request $request, $menu)
    {
        $met=met::findOrFail($menu);
        $met->delete();
        return back();
    }


}
