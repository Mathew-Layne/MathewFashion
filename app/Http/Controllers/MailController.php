<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    function sendmail(){
        $details = [
            'title' => 'This is the title',
            'body' => 'This is the body of the Mail'
        ];
        Mail::to('akeemolayne@gmail.com')->send(new TestMail($details));
        return "Email Sent";
    }
}