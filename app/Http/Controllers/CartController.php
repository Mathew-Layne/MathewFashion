<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{    
    function cart(){
        $uid = session()->get('User_id');

        $products1 = DB::table('cart')
        ->join('product', 'cart.product_id', 'product.id')
        ->where('user_id', session()->get('User_id'))
        ->where('cart.cart_status', 'Cart')
        ->select('product.*')
        ->get();        

        $uid = session()->get('User_id');

        $cart_count = DB::table('cart')
            ->join('product', 'cart.product_id', 'product.id')
            ->where('user_id', $uid)
            ->where('cart.cart_status', 'Cart')
            ->count();

        session()->put('Cart_count', $cart_count);
        
        $products = [];
        
        foreach ($products1 as $product){

            
            $products [] = $product;
        }

        // dd($cart);
        return view("cart",['products'=>$products]);
    }

    function addtocart(Request $req)
    {
        if(session()->has('Username')){
            $uid = session()->get('User_id');
            $data = DB::table('cart')
                ->insert([
                    'product_id' => $req->product_id,
                    'user_id' => $uid,
                    'qty'=> $req->qty,
                ]);

            $cart_count = DB::table('cart')
            ->join('product', 'cart.product_id', 'product.id')
            ->where('user_id', $uid)
            ->where('cart.cart_status', 'Cart')
            ->count();
            
            session()->put('Cart_count', $cart_count);

            return redirect("product");
        }else{
            return redirect("login");
        }
        
    }

    function remove($id){
        DB::table('cart')
        ->where('product_id', $id)
        ->delete();      
        return redirect("cart");
    }

    function checkout(){

        $uid = session()->get('User_id');
        $cart_count = DB::table('cart')
            ->join('product', 'cart.product_id', 'product.id')
            ->where('user_id', $uid)
            ->where('cart.cart_status', 'Cart')
            ->count();

        session()->put('Cart_count', $cart_count);
        
        $total = DB::table('cart')
        ->join('product', 'cart.product_id', 'product.id')
        ->where('user_id', $uid)
        ->where('cart.cart_status', 'Cart')
        ->select('product.*', 'cart.*')
        ->get();
        
        $total_price = 0;
            foreach ($total as $price){
                $total_sum = $price->price * $price->qty;
                $total_price += $total_sum;
            }
        
        $products = DB::table('cart')
        ->join('product', 'cart.product_id', 'product.id')
        ->where('user_id', session()->get('User_id'))
        ->where('cart.cart_status', 'Cart')
        ->select('product.*', 'cart.*')
        ->get(); 
        
              

        return view('/checkout')->with(['total_price' => $total_price, 'products' => $products]);
    }

    

    function purchased(){

        $uid = session()->get('User_id');
        
        $points = DB::table('signup')
        ->where('id', $uid)
        ->increment('points', 100); 
        
       $quan= DB::table('cart')       
        ->where('user_id', $uid)
        ->get();
       
            foreach($quan as $info)
            $de = DB::table('cart')
            ->join('product', 'cart.product_id', 'product.id')
            ->where('user_id', $uid)
            ->where('product.id', $info->product_id)
            ->where('cart.cart_status', 'Cart')               
            ->decrement('product.quantity', $info->qty);
            
            /* DB::table('cart')
            ->join('product','product.id', 'cart.product_id') */          

        $purchased = DB::table('cart')
        ->join('product', 'cart.product_id', 'product.id')
        ->where('user_id', session()->get('User_id'))        
        ->select('product.*')
        ->update(['cart_status' => "Purchased"]);

        $product = DB::table('cart')
        ->join('product', 'cart.product_id', 'product.id')
        ->where('user_id', session()->get('User_id'))
        ->select('product.*', 'cart.*')
        ->get();

        foreach($product as $product){
            DB::table('orders')              
                ->insert([
                    'user_id' => $product->user_id,
                    'product_id' => $product->product_id,
                    'product_name' => $product->pro_name,
                    'description' => $product->description,
                    'price' => $product->price,
                    'cart_id' => $product->id,
                    'quantity' => $product->qty,
                    'purchased_date' => date('Y-m-d H:i:s'),
                ]);
        }
                

        $delete = DB::table('cart')
        ->join('product', 'cart.product_id', 'product.id')
        ->where('user_id', session()->get('User_id'))
        ->where('cart.cart_status', 'Purchased')
        ->delete();

        $cart_count = DB::table('cart')
            ->join('product', 'cart.product_id', 'product.id')
            ->where('user_id', $uid)
            ->where('cart.cart_status', 'Cart')
            ->count();   
            
        session()->put('Cart_count', $cart_count);

        return view('purchased');
    }
    
}
