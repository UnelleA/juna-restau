<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\MetsController;


use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
// if(\request('category')){
//     $mets=met::where('category->id', request('category'))->get();
//     return view('', compact('mets.index', 'categories'));
// }
        // $categories = $company->mets()->inRandomOrder()->take(1000)->get();
        // $company = categories;
        $categories = Category::where('compte_id', auth()->user()->compte->id)->get();
        // $company=Category::where('slug', $slug)->firstOrFail();

        return view('dashboard.categories.index', compact('categories'));

        // auth()->user()->compte->categories;

        // auth()->user()->compte->categories;
// return view(dashboard.categories.index, compact('categories'));
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);
        $filename = time().'.'.$request->image->extension();
        $image = $request->file('image')->storeAs(
            'images',
            $filename,
            'public'
        );
        $category = new Category();
        $category->name = $request->name;
        $category->image = $image;

        auth()->user()->compte->categories()->save($category);

        return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {
        die();

        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $tab = $request->validate([
            'name' => 'required',
            'image' => 'sometimes:image',
        ]);
        $category = Category::findOrFail($id);
        if ($request->image) {
            $filename = time().'.'.$request->image->extension();
            $image = $request->file('image')->storeAs(
                'images',
                $filename,
                'public'
            );
            $data['image'] = $image;
        }
        $data['name'] = $request->name;
        $category->update($data);

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back();
    }
}
