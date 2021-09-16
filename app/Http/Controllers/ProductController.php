<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function product(){
        $uid = session()->get('User_id');
        $cart_count = DB::table('cart')
            ->join('product', 'cart.product_id', 'product.id')
            ->where('user_id', $uid)
            ->where('cart.cart_status', 'Cart')
            ->count();

        session()->put('Cart_count', $cart_count);
        
        $data = DB::table('product')        
        ->get();
        session()->put('Category', 'Product');
        return view('product', ['data'=>$data]);
    }

    function search(){
        session()->put('Category', 'Search');  
            $search = $_GET['search'];
            $users = DB::table('product')
            ->where('pro_name', 'LIKE', '%' . $search . '%')
            ->get();
            return view('search', ['data' => $users]);
        
    }

    function productdetails($id = null)    
    {
        $data = DB::table('product')
        ->where('id', $id)
        ->get();
        // dd($data);
        return view('/productdetails', ['data'=>$data]);
    }

    function jewelry()
    {
        $data = DB::table('product')
        ->where('category', 'Jewelry')
            ->get();
        session()->put('Category', 'Jewelry');
        return view('/product', ['data' => $data]);
    }    

    function pants()
    {
        $data = DB::table('product')
        ->where('category', 'Pants')
        ->get();
        session()->put('Category', 'Pants');
        return view('/product', ['data' => $data]);
    }

    function shirts()
    {
        $data = DB::table('product')
        ->where('category', 'Shirts')
        ->get();
        session()->put('Category', 'Shirts');
        return view('/product', ['data' => $data]);
    }

    function shoes()
    {
        $data = DB::table('product')
        ->where('category', 'Shoes')
        ->get();
        session()->put('Category', 'Shoes');
        return view('/product', ['data' => $data]);
    }

    function suits()
    {
        $data = DB::table('product')
        ->where('category', 'Suits')
        ->get();
        session()->put('Category', 'Suits');
        return view('/product', ['data' => $data]);
    }
}

