<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    function api(){
        $data = DB::table('');
        return ['First Name' => 'Mathew', 'Last Name' => 'Layne'];
    }
}
