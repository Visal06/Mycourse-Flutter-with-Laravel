<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\Side;

class AppController extends Controller
{
    public function index(){
        $pro = Product::with("progallary")->select("id","categoryid","attributevalueid","title","images","prices","description")->get();
        $cate = Category::select("id","title","image")->get();
        $slide = Side::select("slideurl","orderitem")->orderBy('id', 'DESC')->get();

        $data = array(
            "slide" => $slide,
            "pro" =>$pro,
            "cat" => $cate
        );
        return response()->json($data,201);
    }
    public function getProductByCategory($id){
        $product = Product::with("progallary")->select("id","categoryid","attributevalueid","title","images","prices","description")->where("categoryid",$id)->get();
        return response()->json($product,201);
    }
    public function getProduct(){
        $product = Product::select("id","categoryid","attributevalueid","title","images","prices","description")->get();
        return response()->json($product,201);
    }
    public function getProductDetail($id){
        $product = Product::with("progallary")
        ->select("id","categoryid","attributevalueid","title","images","prices","description")->find($id);
        return response()->json($product,201);
    }

    public function payment(Request $request){

        $pay = new Payment();
        $pay->payments_date = now();
        $pay->amount = $request->total_amount;
        $pay->save();
        $proid = $pay->id;
        $productDetailsData = $request->payment_details;
        foreach($productDetailsData as $detail) {
            $detaildata = new PaymentDetail();
            $detaildata->paymentId = $proid;
            $detaildata->productId = $detail['productId'];
            $detaildata->qty = $detail['qty'];
            $detaildata->amount = $detail['price'];
            $detaildata->save();
            
        }
        

        return response()->json(['message' => 'Payment stored successfully'], 201);
    } 
    public function getpayment(){
        $pay = Payment::latest()->first();
        $detail =PaymentDetail::where("paymentId",$pay->id)->get();
        $data = array(
            "pay" =>$pay,
            "detail"=>$detail
        );
        return response()->json($data,201);
    }   
}