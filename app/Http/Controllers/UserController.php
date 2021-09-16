<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function home()
    {
        return view('home');
    }

    function profile()
    {
        $email = session()->get('Email');
        $data = DB::table('signup')
            ->where('email', $email)
            ->get();
        session()->put('check', 'profile');
        return view('/profile', ['data' => $data]);
    }

    function mypurchases()
    {
        session()->put('check', 'MyPurchases');
        $uid = session()->get('User_id');

        $pdate = DB::table('orders')
            ->select('purchased_date')
            ->groupByRaw('purchased_date')
        ->get();

        $mypurchases = DB::table('orders')
        ->where('user_id', $uid)
            ->get();
        return view('profile', ['mypurchases' => $mypurchases, 'pdate' => $pdate]);
    }

    function getpurchases(Request $req){
        
        $uid = session()->get('User_id');
        
        $pdate = DB::table('orders')
            ->select('purchased_date')
            ->groupByRaw('purchased_date')
            ->get();

        $mypurchases = DB::table('orders')
        ->where('user_id', $uid)
        ->where('purchased_date', $req->purchases)
        ->get();
        return view('profile', ['mypurchases' => $mypurchases, 'pdate' => $pdate]);
    }

    function invoice()
    {
        $uid = session()->get('User_id');
        $email = session()->get('Email');

        $data = DB::table('signup')
            ->where('email', $email)
            ->get();

        $products = DB::table('cart')
            ->join('product', 'cart.product_id', 'product.id')
            ->where('user_id', session()->get('User_id'))
            ->where('cart.cart_status', 'Purchased')
            ->select('product.*')
            ->get();

        $total = DB::table('cart')
            ->join('product', 'cart.product_id', 'product.id')
            ->where('user_id', $uid)
            ->where('cart.cart_status', 'Purchased')
            ->sum('product.price');

        if (isset($email)) {
            return view('invoice')->with(['products' => $products, 'data' => $data[0], 'total' => $total]);
        } else {
            return view('login');
        }
    }
    function rewards()
    {
        $email = session()->get('Email');
        $data = DB::table('signup')
            ->where('email', $email)
            ->get();
        session()->put('check', 'Rewards');
        if(isset($email)){
            return view('/profile', ['data' => $data[0]]);
        }else{
            return view('login');
        }
        
    }
}
