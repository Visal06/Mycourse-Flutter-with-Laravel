<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::all();
        return view('categories.index', compact('data'));
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
    public function store(Request $request)
    {

        $request->validate([
            'txttitle' => 'required|string|max:255',
            'txtdescription' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('Category');

        $data = Category::create([
            'title' => $request->txttitle,
            'description' => $request->txtdescription,
            'image' => $imagePath,
        ]);

        return redirect()->route('category.show', $data->id);
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'txttitle' => 'required|string|max:255',
            'txtdescription' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $id->update([
            'title' => $request->txttitle,
            'description' => $request->txtdescription,

        ]);
        if ($request->hasFile('image')) {
            Storage::delete($id->image);
            $id->image = $request->file('image')->store('Category');
            $id->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Storage::delete($id->image);
        $id->delete();
        return redirect()->route('categories.index');
    }
}