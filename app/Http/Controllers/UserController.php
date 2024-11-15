<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index(){
        $title='Users';
        $users=User::get();
        dd($users);
        return view('users.index',compact('title','users'));
    }
}
