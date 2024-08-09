<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductGallary;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('categories')->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([

            'description' => ['required', 'string'],

        ]);


        $file = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('Product');
        } else {
            $defaultImagePath = 'theme/image/default.png';
            $file = Storage::putFile('Product', new File(public_path($defaultImagePath)));
        }
        $product = Product::create([
            'notedate' => $request->txtdate,
            'category_id' => $request->txtcategory_id,
            'name' => $request->txtname,
            'qty' => $request->txtquantity,
            'price' => $request->txtprice,
            'amount' => $request->txtamount,
            'totalprice' => $request->txttotalprice,
            'image' => $file,
            'status' => $request->txtstatus,
            'description' => $request->description,
        ]);


        $fileGallary = null;
        if ($request->hasFile('gallary_image')) {
            $proid = $product->id;
            $fileGallary = $request->file('gallary_image');
            foreach ($fileGallary as $image) {
                $path = $image->store('galleries');
                $gall = new ProductGallary();
                $gall->product_id = $proid;
                $gall->image = $path;
                $gall->save();
            }
        } else {
            $defaultImagePath = 'theme/image/default.png';
            $fileGallary = Storage::putFile('galleries', new File(public_path($defaultImagePath)));
            $gall = new ProductGallary();
            $gall->product_id = $product->id;
            $gall->image = $fileGallary;
            $gall->save();
        }
        return redirect()->route('product.show', $product->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {

        $cate = Category::all();
        $pro = ProductGallary::all();
        $data = array(
            "cate" => $cate,
            "pro" => $pro,
            "product" => $product // Pass the product data to the view
        );
        return view('products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            //'txtdate' => ['required', 'notedate'],
            'txtcategory_id' => ['required', 'numeric'],
            'txtname' => ['required', 'string', 'max:255'],
            'txtquantity' => ['required', 'numeric'],
            'txtprice' => ['required', 'numeric'],
            'txtamount' => ['required', 'numeric'],
            'txttotalprice' => ['required', 'numeric'],
            'txtstatus' => ['required', 'string'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        // Handle the product image upload
        if ($request->hasFile('image')) {
            Storage::delete($product->image);
            $product->image = $request->file('image')->store('Product');
            $product->save();
        }
        // Delete old product gallary images
        $gallary = ProductGallary::where('product_id', $product->id)->get();
        foreach ($gallary as $Pgallary) {
            Storage::delete($Pgallary->image);
            $Pgallary->delete();
        }
        // Handle the product gallary images upload
        if ($request->hasFile('gallary_image')) {
            $fileGallary = $request->file('gallary_image');

            foreach ($fileGallary as $image) {
                $path = $image->store('galleries');
                $gall = new ProductGallary();
                $gall->product_id = $product->id;
                $gall->image = $path;
                $gall->save();
            }
        }



        $product->update([
            'notedate' => $request->txtdate,
            'category_id' => $request->txtcategory_id,
            'name' => $request->txtname,
            'quantity' => $request->txtquantity,
            'price' => $request->txtprice,
            'amount' => $request->txtamount,
            'totalprice' => $request->txttotalprice,
            'status' => $request->txtstatus,
            'description' => $request->description,

        ]);



        return redirect()->route('product.show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //Storage::delete($product->image);
        $gallary = ProductGallary::where('product_id', $product->id)->get();

        foreach ($gallary as $Pgallary) {
            Storage::delete($Pgallary->image);
            $Pgallary->delete();
        }

        $product->delete();
        return redirect()->route('product.index');
    }
}
