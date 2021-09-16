<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class SignupController extends Controller
{
    function signupview(){
        return view('/signup');
    }

    function signup(Request $req)
    {  
        $req->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'username' => 'required|string',
            'phone_no' => 'required|numeric',
            'email' => 'required|email',
            'pwd' => 'required|min:8',
            'address' => 'required',
            'city' => 'required',
            'parish' => 'required',
            
        ]);

        $register = DB::table('signup')        
        ->insert([
            'first_name' => $req->fname,
            'last_name' => $req->lname,
            'username' => $req->username,
            'phone_no' => $req->phone_no,
            'email' => $req->email,
            'password' => Hash::make($req->pwd),
            'address' => $req->address,
            'city' => $req->city,
            'parish' => $req->parish,
        ]);

        $details = [
            'title' => 'Mathew Fashion Registration',
            'body' => 'Thank you '. $req->username .' for becoming a member of Mathew Fashion. By becoming a member, you will receive monthly coupons, discounts and other amazing deals.'
        ];
        Mail::to($req->email)->send(new TestMail($details));
        return redirect('/');
    }
}
