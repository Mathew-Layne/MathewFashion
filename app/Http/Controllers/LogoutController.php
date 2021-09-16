<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    function logout(){
        session()->flush();
        return redirect("/");
    }
}
