<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Side;

class SlideController extends Controller
{
    
    public function index(){
         $data = Side::all();
         return view('slide.index',compact('data'));
    }
    public function create(){
         return view('slide.create');
    }
    public function store(Request $request){
         $request->validate([
            'slideurl' => 'required'
         ]);
         $lastNumber = Side::latest()->first();

        if ($lastNumber) {
            $newValue = $lastNumber->orderitem + 1;
        } else {
            $newValue = 1;
        }
         $data = new Side();
         $data->slideurl = $request->file("slideurl")->store('post');
         $data->orderitem = $newValue;
         $data->save();
         return redirect()->route('slide.index');
    }
    public function edit($id){
         $data =Side::find($id);
         return view('slide.edit',compact('data'));
    }
    public function update($id,Request $request){
         $request->validate([
            'slideurl' => 'required',
         ]);
         $data = Side::find($id);
         $cover = "";
        if($request->hasFile('slideurl')){
            Storage::delete($data->images);
            $cover=$request->file('slideurl')->store('slide');
            $data->slideurl=$cover;
        }

        if($request->file('slideurl'=='')){
            $file= Storage::url($data->images);
            $cover=$request->file($file)->store('slide');
            $data->slideurl=$cover;  
        }
         $data -> orderitem = $request -> orderitem;
         $data->update();
         return redirect()->route('slide.index');
    }
    public function delete($id){
         $data = Side::find($id);
         $data -> delete();
         return redirect()->route('slide.index');
    }
}
