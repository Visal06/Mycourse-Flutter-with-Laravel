<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribute;

class AttributeController extends Controller
{


public function index(){
     $data = Attribute::all();
     return view('attribute.index',compact('data'));
}
public function create(){
     return view('attribute.create');
}
public function store(Request $request){
     $request->validate([
          'title' => 'required'
     ]);
     $data = new Attribute();
     $data -> title = $request -> title;
     $data ->save();
     return redirect()->route('attribute.index');
}
public function edit($id){
     $data =Attribute::find($id);
     return view('attribute.edit',compact('data'));
}
public function update($id,Request $request){
     $request->validate([
          'title' => 'required'
     ]);
     $data = Attribute::find($id);
     $data -> title = $request -> title;
     $data->update();
     return redirect()->route('attribute.index');
}
public function delete($id){
     $data = Attribute::find($id);
     $data -> delete();
     return redirect()->route('attribute.index');
}

}
