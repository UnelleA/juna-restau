<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use Illuminate\Http\Request;

class RestoController extends Controller
{
    public function consulter($slug)
    {
            $company = Compte::where('slug', $slug)->firstOrFail();
        return view('resto.consulter' , compact('company'));
    }

    public function index()
    {
        // $companies=Resto::all();
        return view('resto.index', compact('companies'));

    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'specialite' => 'required',
            'image' => 'required|image',
            // 'video' => 'required|mimes:mp4,mov,ogg | max:20000',


     ]);
        // dd($request->image);
        $path = $request->file('image')->store('logo', 'public');
        $data['image']=$path;
        $data['slug']=str_replace(" ", '-', $request->name);
        auth()->user()->Resto()->create($data);

        return redirect()->route('dashboard');
    }

    public function show(Resto $Resto)
    {
        return view('Resto.show', compact('Resto'));
    }

}
