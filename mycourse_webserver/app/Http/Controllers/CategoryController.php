<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = Category::all();
        return view('categories.index', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Category $category)
    {

        $request->validate([
            'txttitle' => 'required|string|max:255',
            'txtdescription' => 'required|string|max:255',
            // 'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        $file = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('Category');
        } else {
            $defaultImagePath = 'theme/image/default.png';
            $file = Storage::putFile('Category', new File(public_path($defaultImagePath)));
        }

        $category = Category::create([
            'title' => $request->txttitle,
            'description' => $request->txtdescription,
            'image' => $file
        ]);

        return redirect()->route('category.show', $category->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category,)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // $data = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'txttitle' => 'required|string|max:255',
            'txtdescription' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $category->update([
            'title' => $request->txttitle,
            'description' => $request->txtdescription,

        ]);
        if ($request->hasFile('image')) {
            Storage::delete($category->image);
            $category->image = $request->file('image')->store('Category');
            $category->save();
        }
        return redirect()->route('category.show', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Storage::delete($category->image);
        $category->delete();
        return redirect()->route('category.index');
    }
}
