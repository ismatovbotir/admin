<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectController extends Controller
{
    public function collects(){

            $user=Auth::user()->id;
            $shop=Auth::user()->shop->id;
            $role=Auth::user()->role->name;
            $orders=Order::where('shop_id',$shop)->where('status','sent')->get();
           // return $orders->items;
            return view('orders',['orders'=>$orders,'author'=>Auth::user()->name,'role'=>$role]
            );
    }
}
