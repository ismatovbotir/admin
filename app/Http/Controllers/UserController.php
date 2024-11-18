<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Adines;

class UserController extends Controller
{
    public function index(){
        $title='Users';
        $users=User::with('role')->with('shop')->get();
        //dd($users);
        return view('users.index',compact('title','users'));
    }
    public function add(){
        $title='New User';
        
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

    public function store(Request $request){
        //dd($request->all());
        $validation=$request->validate([
           'name'=>'required|min:5|max:20',
           'email'=>'required',
           'password'=>'required|min:6',
           'role_id'=>'required',
           'shop_id'=>'required'



        ]);
        


    }
}
