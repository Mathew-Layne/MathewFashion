<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class LoginController extends Controller
{
    function loginview(){               
        return view('login');
    }

    function login(Request $req)
    {
        $uid = session()->get('User_id');
        $cart_count = DB::table('cart')
            ->join('product', 'cart.product_id', 'product.id')
            ->where('cart.cart_status', 'Cart')
            ->where('user_id', $uid)
            ->count();

        session()->put('Cart_count', $cart_count);
        
        $valid = $req->validate([
            'email' => 'Required|email',
            'password' => 'Required',
        ]);

        if (Auth::attempt($valid)) {            

            $data = DB::table('signup')
            ->where('email', $req->email)
            ->get();

            // echo "<pre>";
            // print_r($data);            
            foreach ($data as $info){
                session()->put('User_Type', $info->user_type);
                session()->put('Username', $info->username);
                session()->put('Status', $info->status);
                session()->put('Email', $info->email);
                session()->put('User_id', $info->id);
                session()->put('Address', $info->address);
                session()->put('City', $info->city);
                session()->put('Parish', $info->parish);
                session()->put('Phone', $info->phone_no);


            }
            
            $utype = session()->get('User_Type'); 
            $usename = session()->get('Username'); 
            $status = session()->get('Status');          

            $req->session()->regenerate();

            if($utype == "Admin"){

                $uid = session()->get('User_id');
                $cart_count = DB::table('cart')
                ->join('product', 'cart.product_id', 'product.id')
                ->where('cart.cart_status', 'Cart')
                ->where('user_id', $uid)
                ->count();

                session()->put('Cart_count', $cart_count);

                return redirect()->intended('/admin');
                
            }elseif($status == "Deactivated"){
                session()->flush();
                $req->session()->regenerate();
                return redirect()->intended('/derror');
            }
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    function adminview(){
        $uid = session()->get('User_id');
        $cart_count = DB::table('cart')
            ->join('product', 'cart.product_id', 'product.id')
            ->where('user_id', $uid)
            ->where('cart.cart_status', 'Cart')
            ->count();

        session()->put('Cart_count', $cart_count);
        return view('admin');
    }
}
