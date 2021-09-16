<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    function viewupload(){
        return view('/upload');
    }

    function fileupload(Request $req){
        $filename = $req->file('file')->getClientOriginalName();
        return $req->file('file')->storeAs('public', $filename);
    }
}
