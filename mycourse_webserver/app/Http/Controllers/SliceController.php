<?php

namespace App\Http\Controllers;

use App\Models\Slice;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slices = Slice::all();
        return view('slices.index', compact('slices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('slices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Slice $slice)
    {
        $request->validate([
            'txtimage' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'txtdescription' => ['required', 'string'],

        ]);
        $file = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('Slices');
        } else {
            $defaultImagePath = 'theme/image/default.png';
            $file = Storage::putFile('Slices', new File(public_path($defaultImagePath)));
        }

        $slice = Slice::create([
            'image' => $file,
            'description' => $request->txtdescription,

        ]);

        return redirect()->route('slice.show', $slice->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Slice $slice)
    {

        return view('slices.show', compact('slice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slice $slice)
    {
        //  $data = Slice::find($id);
        return view('slices.edit', compact('slice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slice $slice)
    {
        $request->validate([
            'txtimage' => 'image|mimes:jpeg,png,jpg|max:2048',
            'txtdescription' => ['required', 'string'],

        ]);

        if ($request->hasFile('image')) {
            Storage::delete($slice->image);
            $file = $request->file('image')->store('Slices');
        } else {
            $file = $slice->image;
        }

        $slice->update([
            'image' => $file,
            'description' => $request->txtdescription,
        ]);

        return redirect()->route('slice.show', $slice->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slice $slice)
    {
        Storage::delete($slice->image);
        $slice->delete();
        return redirect()->route('slice.index');
    }
}
