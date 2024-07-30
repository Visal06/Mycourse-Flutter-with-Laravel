<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
   

public function index(){
     $data = Category::all();
     return view('category.index',compact('data'));
}
public function create(){
     return view('category.create');
}
public function store(Request $request){
     $request->validate([
          'title' => 'required'
     ]);
     $data = new Category();
     $data -> title = $request -> title;
     $data -> image = $request -> image;
     $data ->save();
     return redirect()->route('category.index');
}
public function edit($id){
     $data =Category::find($id);
     return view('category.edit',compact('data'));
}
public function update($id,Request $request){
     $request->validate([
          'title' => 'required'
     ]);
     $data = Category::find($id);
     $data -> title = $request -> title;
     $data -> image = $request -> image;
     $data->update();
     return redirect()->route('category.index');
}
public function delete($id){
     $data = Category::find($id);
     $data -> delete();
     return redirect()->route('category.index');
}
}
