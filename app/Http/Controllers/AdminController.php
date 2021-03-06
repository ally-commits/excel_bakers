<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Carbon\Carbon;
use App\Review;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count_users = DB::table("users")->count();
        $count_products = DB::table("products")->count();
        $count_reviews = DB::table("reviews")->count();
        $count_order_products = DB::table("order_products")->count();
        $count_orders = DB::table("orders")->where('orderPlaced',true)->count();
        $count_pending = DB::table("orders")->where('status',"pending")->where('orderPlaced',true)->count();
        $count_approved = DB::table("orders")->where('status',"approved")->where('orderPlaced',true)->count();
        $count_rejected = DB::table("orders")->where('status',"rejected")->where('orderPlaced',true)->count();
        $db = ['users','orders','reviews']; 
        $products_count = DB::table('order_products')
                ->select('productId as id', DB::raw('sum(quantity) as quantity'))
                ->groupBy('productId')
                ->orderBy("quantity","desc")
                ->limit(3)
                ->get();
        foreach($products_count as $prd) {
            $data = DB::table("products")->where("id", $prd->id)->first();
            $prd->name = $data->name;
        } 
         
        $month = [];  
        foreach($db as $d) {
            if($d == 'orders')
                $month[$d] = DB::table($d)->where('orderPlaced',true)->whereMonth('created_at', Carbon::now()->month)->count();
            else
                $month[$d] = DB::table($d)->whereMonth('created_at', Carbon::now()->month)->count();
        }
        $order = DB::table('orders')
            ->join('users', 'orders.userId', '=', 'users.id') 
            ->join('addresses', 'orders.adrId', '=', 'addresses.id') 
            ->select('users.name as name','orders.total',"orders.id as id")
            ->where("orders.orderPlaced", true) 
            ->limit(3)
            ->get(); 

        $orderProducts = DB::table("order_products")
            ->join('products','order_products.productId','=','products.id')
            ->select('products.name',"order_products.orderId as id")                 
            ->get();  
        return view('admin.dashboard')
                ->with("count_users", $count_users)
                ->with("count_products", $count_products)
                ->with("count_reviews", $count_reviews)
                ->with("count_order_products", $count_order_products)
                ->with("count_orders", $count_orders)
                ->with("count_pending", $count_pending)
                ->with("count_approved", $count_approved)
                ->with("month", $month)
                ->with("order", $order)->with("orderProducts", $orderProducts)
                ->with("products_count",$products_count)
                ->with("count_rejected", $count_rejected);
    }
    public function viewReviews() {
        $data = DB::table('reviews')
            ->join('users', 'reviews.userId', '=', 'users.id') 
            ->join('products', 'reviews.prdId', '=', 'products.id') 
            ->select('users.email', 'products.name','products.image','reviews.id','reviews.rate','reviews.desc') 
            ->get();  

        return view("admin.viewReview")->with("products",$data);
    }
    public function del($id) {
        $review = Review::find($id);
        $review->delete();

        return Redirect::route('admin.viewReviews')->with('message', 'Review delted Succesfully'); 
    }
    public function viewUsers() {
        $data = DB::table('users')
            ->join('profiles', 'profiles.userId', '=', 'users.id') 
            ->select('profiles.*', 'users.*') 
            ->get();  
        
        return view('admin.viewUsers')->with('users',$data);
    }
    public function viewOrders() {
        $order = DB::table('orders')
            ->join('users', 'orders.userId', '=', 'users.id') 
            ->join('addresses', 'orders.adrId', '=', 'addresses.id') 
            ->select('orders.id','orders.total','orders.status','orders.created_at','addresses.address','addresses.phoneNumber')   
            ->where("orders.orderPlaced", true)
            ->latest()  
            ->get();   
        $orderProducts = DB::table("order_products")
            ->join('products','order_products.productId','=','products.id')
            ->select('order_products.*','products.price','products.name','products.image')                 
            ->get();
 
        return view('admin.viewOrders')->with('orders',$order)->with("orderProducts", $orderProducts);
    }
    public function approveOrder($id) { 
        DB::table("orders")
            ->where("orders.id","=", $id)
            ->update(["status" => 'approved']);
        
        return Redirect::route('admin.viewOrders')->with('message', 'Order Approved Succesfully'); 
    }
    public function cancelOrder($id) {
        DB::table("orders")
            ->where("orders.id","=", $id)
            ->update(["status"=> 'rejected']);
        
        return Redirect::route('admin.viewOrders')->with('message', 'Order Cancellled Succesfully'); 
    }
}
