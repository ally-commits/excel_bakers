<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
use Redirect; 

class AdminProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function viewProduct() {
        $data = Product::all();

        return view('admin.viewProduct')->with('products',$data);
    }
    public function addProduct(Request $request) {
        $data = $request->all();  
        $request->validate([ 
            'name' => ['required', 'string', 'min:3'],
            'price' => ['required', 'integer'],
            'image' => ['required','image','mimes:jpeg,png,jpg'], 
            'type' => ['required','boolean'],
            'desc' => ['required','string','min:5']
        ]);
        
        $image = $request->file('image');
        $imageName = time().'.'.$data['image']->getClientOriginalExtension();
        $image->move('images/products', $imageName);

        Product::create([
            'name' => $data['name'],
            'price' => $data['price'], 
            'desc' => $data['desc'],
            'type' => $data['type'],
            'image' => 'images/products/'.$imageName
        ]);
        return Redirect::route('admin.viewProduct')->with('message', 'Product Added Succesfully');   
    }

    public function updateProduct(Request $request) {
        $request->validate([ 
            'name' => ['required', 'string', 'min:3'],
            'price' => ['required', 'integer'],  
            'desc' => ['required','string','min:5']
        ]);
        $data = $request->all();   

        if($request['image'] != null) { 
            $request->validate([ 
                'image' => ['required','image','mimes:jpeg,png,jpg'],
            ]);
            $image = $request->file('image');
            $imageName = time().'.'.$data['image']->getClientOriginalExtension();
            $image->move('images/products', $imageName);

            DB::table('products')
                ->where('id' ,'=', $request['id'])
                ->update(['image' => 'images/products/'.$imageName]);
        }
        

        DB::table('products')
            ->where('id' ,'=', $request['id'])
            ->update(['name' => $data['name'],'price' => $data['price'], 'desc' => $data['desc'],'type' => $data['type']]);
        
        return Redirect::route('admin.viewProduct')->with('message', 'Product Added Succesfully');   
    }
    public function deleteProduct($id) {
        $team = Product::find($id);
        $team->delete();
        
        return Redirect::route('admin.viewProduct')->with('message', 'Product Removed Succesfully');   
    }
}
