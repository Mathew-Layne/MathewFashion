<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function adminview(){
        // $check = 'profile';
        $email = session()->get('Email');
        $data = DB::table('signup')
        ->where('email', $email)
        ->get();
        
        session()->put('check','profile' );
        return view('/admin', ['data' => $data]);
    }

    function dashboard(){
        $users = DB::table('signup')
        ->count();

        $products = DB::table('product')
        ->count();

        session()->put('check', 'dashboard');
        return view('/admin', ['users'=>$users, 'products'=>$products]);        
        

    }

    function users(){   
             
        $data = DB::table('signup')
        ->where('status', 'Active')
        ->get();
        session()->put('check', 'users');
        return view('/admin', ['data' => $data]);
    }

    function inventory(){        
        $inventory = DB::table('product')        
        // ->get();
        ->simplePaginate(5);

        // dd($inventory);
        session()->put('check', 'Inventory');
        return view('admin', ['inventory' => $inventory]);
    }

    // function mypurchases()
    // {
    //     date_default_timezone_set("Jamaica");
    //     $uid = session()->get('User_id');
    //     $purchases = DB::table('cart')
    //     ->join('product', 'cart.product_id', 'product.id')
    //     ->where('user_id', session()->get('User_id'))
    //     ->where('cart.cart_status', 'Purchased')
    //     ->select('product.*')
    //     ->simplePaginate(5);
    //     session()->put('check', 'MyPurchases');
    //     return view('admin', ['purchases' => $purchases]);
    // }

    function deactivate($id = null)
    {        
         DB::table('signup')
        ->where('id', $id)
        ->update([
            'status' => 'Deactivated',
        ]);        
        return redirect('/users');
    }

    function activate($id = null)
    {
        DB::table('signup')
        ->where('id', $id)
            ->update([
                'status' => 'Active',
            ]);
        return redirect('/users');
    }

    function addproductview(){
        session()->put('check', 'addproduct');
        return view('admin');
    }

    function addproduct(Request $req)
    {
        $valid = $req->validate([
            'pro_name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image'=>'required|image',
            'category'=>'required',
            'quantity' => 'required|numeric',
        ]);

        $filename = $req->file('image')->getClientOriginalName();

        DB::table('product')
        ->insert([
            'pro_name'=> $req->pro_name,
            'price' => $req->price,
            'description' => $req->description,
            'category' => $req->category,
            'image' => $req->file('image')->storeAs('public',$filename),
            'quantity' => $req->quantity,
        ]);
        return redirect('/addproduct');
    }

    function editview()
    {
        $data = DB::table('signup')
        ->where('id', session()->get('User_id'))
        ->get(); 
        // echo '<pre>'; print_r($data);
    
        return view('/edit', ['data' => $data[0]]);
    }

    function edit(Request $req){
        DB::table('signup')
        ->where('id', session()->get('User_id'))
        ->update([
            'first_name' => $req->fname,
            'last_name' => $req->lname,
            'username' => $req->username,
            'phone_no' => $req->phone_no,           
            'address' => $req->address,
            'city' => $req->city,
            'parish' => $req->parish,
        ]);
        return redirect('/admin');
    }
    
    function removeproduct($id){
        DB::table('product')
        ->where('id', $id)
        ->delete();

        return redirect('/product');
    }

}
