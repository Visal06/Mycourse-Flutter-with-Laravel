<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\AttributeValue;
use App\Models\ProductGallary;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::orderBy('id', 'ASC')->get();
        return view('product.index', compact('data'));
    }
    public function create()
    {
        $cate = Category::all();
        $attval = AttributeValue::all();
        $data = array(
            "cate" => $cate,
            "attval" => $attval
        );
        return view('product.create', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'categoryid' => 'required',
            'title' => 'required',
            'images' => 'required',
            'prices' => 'required',
            'description' => 'required'
        ]);
        $data = new Product();
        $data->categoryid = $request->categoryid;
        $data->attributevalueid = "1";
        $data->title = $request->title;
        $data->images = $request->file("images")->store('post');
        $data->prices = $request->prices;
        $data->description = $request->description;
        $data->save();

        $proid = $data->id;
        $galleries = $request->file('proimage');
        foreach ($galleries as $image) {
            $path = $image->store('galleries');
            $gall = new ProductGallary();
            $gall->product_id = $proid;
            $gall->images = $path;
            $gall->save();
        }
        return redirect()->route('product.index');
    }
    public function edit($id)
    {
        $cate = Category::all();
        $data = Product::find($id);
        $prodata = array(
            "cate" => $cate,
            "data" => $data
        );
        return view('product.edit', $prodata);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'categoryid' => 'required',
            'title' => 'required',
            'prices' => 'required',
            'description' => 'required'
        ]);
        $data = Product::find($id);
        $cover = "";
        if ($request->hasFile('images')) {
            Storage::delete($data->images);
            $cover = $request->file('images')->store('post');
            $data->images = $cover;
        }

        if ($request->file('images' == '')) {
            $file = Storage::url($data->images);
            $cover = $request->file($file)->store('post');
            $data->images = $cover;
        }

        $data->categoryid = $request->categoryid;
        $data->attributevalueid = '1';
        $data->title = $request->title;
        $data->prices = $request->prices;
        $data->description = $request->description;
        $data->update();
        return redirect()->route('product.index');
    }
    public function delete($id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect()->route('product.index');
    }
}
