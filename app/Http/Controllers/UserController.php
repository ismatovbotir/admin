<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Shop;
use App\Models\Adines;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;

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
        $roles=Role::where('id','!=',1)->get();
        $shops=Shop::get();
        
        //dd($shops);        
        //dd($users);
        return view('users.add',compact('title','roles','shops'));
    }
    public function edit(){
        $title='User Edit';
        return view('users.edit',compact('title'));
    }
    public function show(){
        $title='User Edit';
        return view('users.show',compact('title'));
    }

    public function store(UserRequest $request){
        //dd($request->all());
        // $validation=$request->validate([
        //    'name'=>'required|min:5|max:20',
        //    'email'=>'required',
        //    'password'=>'required|min:6',
        //    'role_id'=>'required',
        //    'shop_id'=>'required'

           //dd((int)$request->input('shop'));

        // ]);
        User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password')),
            'role_id'=>$request->input('role'),
            'shop_id'=>$request->input('shop'),
            'active'=>true    
        
        ]);

        return redirect()->route('users.index');
    }
}
