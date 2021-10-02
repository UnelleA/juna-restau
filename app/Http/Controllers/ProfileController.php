<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required',
            'image' => 'required|image|',
     ]);
        dd($request->image);
        $path = $request->file('image')->store('storage');
        Profile::create($data);

        return redirect()->route('dashboard');
    }

    public function show(Profile $Profile)
    {
        return view('profile.show', compact('Profile'));
    }

    public function edit(Profile $Profile)
    {
        return view('profile.edit', compact('Profile'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
        ]);
    }

    public function destroy(Profile $Profile)
    {
        $Profile->delete();

        return back();
    }
}
