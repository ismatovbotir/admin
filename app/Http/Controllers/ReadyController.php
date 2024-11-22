<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\OrderItem;

class ReadyController extends Controller
{
    public function index()
    {


        $user = Auth::user()->id;
        $shop = Auth::user()->shop->id;
        $role = Auth::user()->role->name;

        $orders = Order::withCount('items')->where('user_id', $user)->whereIn('status', ['ready'])->orderBy('updated_at', 'desc')->get();
        //return $orders;
        return view(
            'ready.index',
            ['orders' => $orders, 'author' => Auth::user()->name, 'role' => $role]
        );
    }
    public function show($id){
        $role = Auth::user()->role->name;
        $order=Order::where('id',$id)->first();    
        //dd($order);
        $orderItems = OrderItem::where('order_id', $id)->get();
        //dd('order');
        return view('ready.ready', ['id'=>$id,'order' => $order, 'orderItems' => $orderItems, 'role' => $role]);
    }

}
