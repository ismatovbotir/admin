<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index(){
        $title='Users';
        $users=User::with('role')->with('shop')->get();
        dd($users);
        return view('users.index',compact('title','users'));
    }
    public function add(){
        $title='User Add';
        
        //dd($users);
        return view('users.add',compact('title'));
    }
    public function edit(){
        $title='User Edit';
        return view('users.edit',compact('title'));
    }
    public function show(){
        $title='User Edit';
        return view('users.show',compact('title'));
    }
}
