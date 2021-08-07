<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class userController extends Controller
{
    function index(Request $req)
    {
        $mydata = ["name"=>$req->name];

        $data = ["name"=>$req->name,"msg"=>$req->msg, "email"=>$req->email];

        $user['to'] = $req->email;

        Mail::send('mail',$data,function($messages) use ($user) {
            $messages->to($user['to']);
            $messages->subject('Testing mail');
        });

        return $req->input();
    }
}
