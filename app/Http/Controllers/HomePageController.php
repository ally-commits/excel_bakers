<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Review;
use DB;

class HomePageController extends Controller
{
    public function index() {
        $products = Product::all();
        $cart = session()->get('cart');
        if($cart) {
            foreach($products as $product) {
                $product['cart'] = 0;
                foreach($cart as $prd) {
                    if($prd['id'] == $product['id']) {
                        $product['cart'] = 1;
                    }
                }
            } 
        } 
        return view('welcome')->with('products',$products);
    }
    public function getProduct($id) {
        $prd = Product::find($id);
        $reviews = DB::table("reviews") 
            ->join("users","users.id",'reviews.userId')
            ->join("profiles","profiles.userId",'reviews.userId')
            ->select("profiles.image",'users.name','reviews.*')
            ->where('prdId',"=",$id)
            ->get();

        return view("product")->with("product",$prd)->with("reviews",$reviews);
    }
}
