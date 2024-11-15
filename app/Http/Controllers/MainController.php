<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        //return Auth::user()->role;
        if(Auth::user()->role->name==null){
            $content="please assign role";
            $tableData=array();
            return view('main',['content'=>$content,'tableData'=>$tableData]);
        }else if (Auth::user()->role->name=="price"){
            //return 'yes';
          return redirect('price');

        }else if (Auth::user()->role->name=="order"){
           
            return redirect('orders');

        }else if (Auth::user()->role->name=="order"){
            return 'collector';
        }
        
    }
       
       
       
       
       
      
}
