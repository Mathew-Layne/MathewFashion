<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function home(){
        $uid = session()->get('User_id');
        $cart_count = DB::table('cart')
            ->join('product', 'cart.product_id', 'product.id')
            ->where('user_id', $uid)
            ->where('cart.cart_status', 'Cart')
            ->count();

        session()->put('Cart_count', $cart_count);
        return view('home');
       }        
    }








    // function search(Request $req)
    // {
    //     $data = DB::table('product')
    //     ->where('category', 'like',"$req->searchbar%")          
    //     ->get();       
    //     // dd($data);
    //     return view('search', ['data' => $data]);
    // }

