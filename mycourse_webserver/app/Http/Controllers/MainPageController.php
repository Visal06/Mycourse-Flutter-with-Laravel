<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Slice;
use App\Models\ProductGallary;

class MainPageController extends Controller
{
    public function index()
    {
        $products = Product::skip(0)->take(6)->get();
        $categories = Category::all();
        $slices = Slice::all();
        $productGalleries = ProductGallary::all();
        return view('main', compact('products', 'categories', 'slices', 'productGalleries'));
    }

    public function chart(Request $request)
    {
        return view('chart');
    }
}
