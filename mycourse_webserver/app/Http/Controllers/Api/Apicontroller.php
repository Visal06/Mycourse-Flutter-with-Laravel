<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category; // Import the Category model class
use App\Models\Slice;
use App\Models\Product;
use App\Models\ProductGallary;
use App\Models\Post;
use App\Models\Staff;


class Apicontroller extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $slices = Slice::skip(0)->take(2)->get();
        $products = Product::with('product_gallary')->get();
        // $galary=ProductGallary::with('galleries')->get();
        $posts = Post::all();
        $staff = Staff::all();
        $data = array(
            'categories' => $categories,
            'slices' => $slices,
            'products' => $products,
            'posts' => $posts,
            'staff' => $staff,
            'status' => true,
            'message' => 'Data fetched successfully'
        );
        return response()->json($data);
    }
}
