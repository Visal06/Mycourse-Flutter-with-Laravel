<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttributeValue;
use App\Models\Attribute;

class AttributeValueController extends Controller
{
    

public function index(){
     $data = AttributeValue::with("attribute")->get();
     return view('attributevalue.index',compact('data'));
}
public function create(){
     $data = Attribute::all();
     return view('attributevalue.create',compact("data"));
}
public function store(Request $request){
     $request->validate([
          'attribute_id' => 'required'
     ]);
     $data = new AttributeValue();
     $data -> attribute_id = $request -> attribute_id;
     $data -> values = $request -> values;
     $data ->save();
     return redirect()->route('attributevalue.index');
}
public function edit($id){
     $data =AttributeValue::find($id);
     return view('attributevalue.edit',compact('data'));
}
public function update($id,Request $request){
     $request->validate([
          'attribute_id' => 'required'
     ]);
     $data = AttributeValue::find($id);
     $data -> attribute_id = $request -> attribute_id;
     $data -> values = $request -> values;
     $data->update();
     return redirect()->route('attributevalue.index');
}
public function delete($id){
     $data = AttributeValue::find($id);
     $data -> delete();
     return redirect()->route('attributevalue.index');
}
}
