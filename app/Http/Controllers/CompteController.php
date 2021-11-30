<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use Illuminate\Http\Request;

class CompteController extends Controller
{
    public function gestion()
    {
        return view('dashboard.compte.gestion');
    }

    public function index()
    {
        $companies = Compte::all();

        return view('dashboard.compte.index', compact('companies'));
    }

    public function activer()
    {
        $company = auth()->user()->compte;

        return view('dashboard.compte.activer', compact('company'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'specialite' => 'required',
            'image' => 'required|image',
            'video' => 'sometimes',

            // 'video' => 'required|mimes:mp4,mov,ogg | max:20000',
     ]);
        // dd($request->image);
        $path = $request->file('image')->store('logo', 'public');
        $data['image'] = $path;
        $data['slug'] = str_replace(' ', '-', $request->name);
        auth()->user()->compte()->create($data);

        return redirect()->route('dashboard');
    }

    public function show(compte $Compte)
    {
        return view('compte.show', compact('Compte'));
    }

    public function edit(compte $Compte)
    {
        return view('compte.edit', compact('Compte'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'specialite' => 'required',
            'image' => 'required|image',
            // 'video' => 'sometimes|required|video',
            'video' => 'sometimes|image',
     ]);
        // dd($request->image);
        $path = $request->file('image')->store('logo', 'public');
        $data['image'] = $path;
        $data['slug'] = str_replace(' ', '-', $request->name);
        auth()->user()->compte()->update($data);

        return redirect()->route('dashboard');
    }

    public function destroy(compte $Compte)
    {
        $Compte->delete();

        return back();
    }

    // public function show_resto()
    // {
    //     return view('resto.show_resto');
    // }
    public function show_resto($slug)
    {
            $company = Compte::where('slug', $slug)->firstOrFail();
        return view('resto.show_resto' , compact('company'));
    }
}
