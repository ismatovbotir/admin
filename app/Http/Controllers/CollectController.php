<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\OrderItem;

class CollectController extends Controller
{
    public function index(){

          
        $user = Auth::user()->id;
        $shop = Auth::user()->shop->id;
        $role = Auth::user()->role->name;
        //$collects=[];
        $orders = Order::withCount('items')->where('shop_id', $shop)->where('status', 'sent')->orderBy('created_at', 'desc')->get();
                //return $orders;
        return view(
            'collects.index',
            ['orders' => $orders, 'author' => Auth::user()->name, 'role' => $role]
        );
    }
    public function collect($id)
    {
        $role = Auth::user()->role->name;
        $order=Order::where('id',$id)->first();    
        //dd($order);
        $orderItems = OrderItem::where('order_id', $id)->get();
        //dd('order');
        return view('collects.collect', ['id'=>$id,'order' => $order, 'orderItems' => $orderItems, 'role' => $role]);
    }

    public function editItem($id)
    {
        $role = Auth::user()->role->name;
        $item = OrderItem::where('id', $id)->get();
        //dd($item[0]);
        return view('collects.collectItem', ['data' => $item[0], 'id' => $item[0]->order_id, 'role' => $role]);
    }

    public function checkItem(Request $request, $id)
    {
        $role = Auth::user()->role->name;
        $barcode = $request->input('barcode');

        if ($barcode == '' || $id == '') {
            return back();
        }
        // return $request->all();
        //$price_code=Auth::user()->shop->price_code;
        if ($barcode == null) {
            return back();
        }
        $orderItem = OrderItem::where('order_id', $id)
            ->where(function ($query) use ($barcode) {

                $query->where('barcode', $barcode)->orWhere('code', $barcode);
            })->get();
        //return $orderItem->count();
        if ($orderItem->count() == 1) {
            return redirect()->route('collects.show',['id'=>$id]); //view('collects.collectItem', ['data' => $orderItem[0], 'id' => $id, 'role' => $role]);
        } else {
            return back();
        }
    }

    public function collectAddItem(Request $request, $id)
    {
        //return $request->all();
        $code = $request->input('code');
        $qty = $request->input('qty');
        //$name=$request->input('name');
        //$barcode=$request->input('barcode');
        if ($qty == 0) {
            return redirect()->route('cllects.show', ['id' => $id]);
        }
        $itemInOrder = OrderItem::where('order_id', $id)->where("code", $code)->get();
        if ($itemInOrder->count() == 0) {

            return back();
        } else {
            OrderItem::where('id', $itemInOrder[0]->id)->update(["qty_done" => $qty + $itemInOrder[0]->qty_done]);
        }
        //return $orderItem;
        return redirect()->route('collects.show', ['id' => $id]);
    }



    public function collectStatus($id, $status)
    {
        
        $order = Order::where('id', $id)->first();
        $order->status = $status;
        $order->save();

        $orderStatus = new OrderStatus();
        $orderStatus->user_id = Auth::user()->id;
        $orderStatus->order_id = $order->id;
        $orderStatus->status = $status;
        $orderStatus->save();

        return redirect()->route('collects.index');
    }
}
