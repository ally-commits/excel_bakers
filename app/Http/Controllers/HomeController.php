<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB; 
use App\User;
use App\Review;
use App\Product;
use App\Order;
use App\Profile;
use App\OrderProduct;
use App\Address;
use Redirect;

class HomeController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth');
    } 
    public function index($active)
    {    
        $user = User::find(Auth::user()->id);
        $profile = DB::table("profiles")->where('userId',Auth::user()->id)->get();
        if(count($profile) == 0) {
            Profile::create([
                'userId' => Auth::user()->id,
                'image' => 'images/sample/avatar.png',
                'phoneNumber' => 1011101100,
            ]);

            $profile = DB::table("profiles")->where('userId',Auth::user()->id)->get();
        }  
        $address = DB::table("addresses")->where('user_id', Auth::user()->id)->get();

        $order = DB::table('orders')
            ->join('users', 'orders.userId', '=', 'users.id') 
            ->join('addresses', 'orders.adrId', '=', 'addresses.id') 
            ->select('orders.*','users.*','addresses.*')  
            ->where('users.id','=',Auth::user()->id)
            ->where("orders.orderPlaced", true)
            ->get();   
        $review = DB::table('reviews')
                ->where('userId',"=",Auth::user()->id)
                ->get();
        $product = [];
        $ids = [];
        if(count($review) == 0) {
            $product = DB::table('products')   
                ->limit(1)
                ->get();   
        } else {
            foreach($review as $r) {
                array_push($ids, $r->prdId);
            }
            $product = DB::table("products")
                    ->whereNotIn("id", $ids)
                    ->limit(1)
                    ->get();
        } 
        return view('auth.profile')->with('profile', $profile)
                                ->with('active', $active)
                                ->with('address',$address)
                                ->with('orders',$order)
                                ->with('products',$product);
    }
    public function review(Request $request) {
        $data = $request->all();
        Review::create([
            'prdId' => $data['prdId'],
            'userId' => Auth::user()->id,
            'desc' => $data['desc'],
            'rate' => $data['rate']
        ]);
        return Redirect::route('profile',4)->with('message', 'Reviewd Succesfully'); 
    }
    public function editProfile(Request $request) {
        $data = $request->all(); 
        $request->validate([ 
            'name' => ['required', 'string', 'min:3'],  
            'phoneNumber' => ['required','integer']
        ]);
        if($request['image'] != null) { 
            $request->validate([ 
                'image' => ['required','image','mimes:jpeg,png,jpg'],
            ]);
            $image = $request->file('image');
            $imageName = time().'.'.$data['image']->getClientOriginalExtension();
            $image->move('images/profiles', $imageName);

            DB::table('profiles')
                ->where('userId' ,'=', Auth::user()->id)
                ->update(['image' => 'images/profiles/'.$imageName]);
        }

        DB::table('profiles')
            ->where('userId' ,'=', Auth::user()->id)
            ->update(['phoneNumber' => $data['phoneNumber']]);
        DB::table('users')
            ->where('id' ,'=', Auth::user()->id)
            ->update(['name' => $data['name']]);
        
        return Redirect::route('profile',1)->with('message', 'Profile Updated Succesfully'); 
    }
    public function addAddress(Request $request) {
        $request->validate([ 
            'address' => ['required', 'string', 'min:5'],  
            'phoneNumber' => ['required','integer']
        ]);  
        $data = $request->all();
        Address::create([
            'user_id' => Auth::user()->id,
            'address' => $data['address'],
            'phoneNumber' => $data['phoneNumber']
        ]); 
        return Redirect::route('profile',2)->with('message', 'Address Added Succesfully');
    }
    public function deleteAddress($id) {
        $adr = Address::find($id);
        $adr->delete();
        
        return Redirect::route('profile',2)->with('message', 'Address Removed Succesfully');  
    } 
    public function cancelOrder($active, $id) {
        DB::table("orders")
            ->where("orders.id","=", $id)
            ->update(["status"=> 'cancelled']);
        
        return Redirect::route('profile',3)->with('message', 'Order Cancellled Succesfully'); 
    }
    public function invoice($active, $id) {
        $order = DB::table('orders')
            ->join('users', 'orders.userId', '=', 'users.id') 
            ->join('addresses', 'orders.adrId', '=', 'addresses.id') 
            ->select('orders.id','orders.total','orders.status','orders.created_at','orders.updated_at','addresses.address','addresses.phoneNumber')   
            ->where('orders.id','=',$id)  
            ->get();   
        $orderProducts = DB::table("order_products")
            ->join('products','order_products.productId','=','products.id')
            ->select('order_products.*','products.price','products.name','products.image','products.desc')   
            ->where('order_products.orderId','=',$id)              
            ->get();
 
        return view('auth.invoice')->with('orders',$order)->with("orderProducts", $orderProducts);
    }

}
