<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\OrderItem;
use App\Models\Adines;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function orders(){
      

        $user=Auth::user()->id;
        $shop=Auth::user()->shop->id;
        $role=Auth::user()->role->name;
        if($role=='order'){

            $orders=Order::withCount('items')->where('user_id',$user)->whereIn('status',['new','ready'])->orderBy('updated_at','desc')->get();
        }elseif($role=='collect'){
            $orders=Order::withCount('items')->where('shop_id',$shop)->where('status','sent')->orderBy('created_at','desc')->get();
        }
        //return $orders;
        return view('orders',['orders'=>$orders,'author'=>Auth::user()->name,'role'=>$role]
        );
    } 

    public function order($id){
        $role=Auth::user()->role->name;
        
        $orderItems=OrderItem::where('order_id',$id)->get();
        return view('order',['id'=>$id,'orderItems'=>$orderItems,'role'=>$role]);
    }

    public function orderCreate(){

        $order=new Order();

        $order->status="new";

        $order->user_id=Auth::user()->id;

        $order->shop_id=Auth::user()->shop->id;

        $order->save();

        $orderStatus=new OrderStatus();
        $orderStatus->user_id=Auth::user()->id;
        $orderStatus->order_id=$order->id;
        $orderStatus->save();

        return redirect()->route('order',['id'=>$order->id]);

    }

    public function orderItem(Request $request,$id){
        $role=Auth::user()->role->name;
       $barcode=$request->input('barcode');
      
       if ($barcode=='' || $id==''){
        return back();
       }
      // return $request->all();
      $price_code=Auth::user()->shop->price_code;
      $ware_code=Auth::user()->shop->ware_code;
      if ($barcode==null){
          return back();
      }
      $adines=Adines::first();
      //dd($adines);
      $auth=base64_encode($adines->login.':'.$adines->password);
      $response = Http::withHeaders([
          'Authorization' => 'Basic '.$auth,
          'Cache-Control'=>'no-cache',
          'Content-Type'=>'application/json'

      ])->post($adines->adress.'/hs/item?code='.$price_code.'&barcode='.$barcode.'&ware='.$ware_code);
      //return $response;
      $res=$response->json();
      //dd($res);
       if($res["code"]==1){
          return back();
      }else{

        return view('orderItem',['data'=>$res['data'],'id'=>$id,'role'=>$role]);
      }  
       
    }

    public function checkItem(Request $request,$id){
        $role=Auth::user()->role->name;
        $barcode=$request->input('barcode');
       
        if ($barcode=='' || $id==''){
         return back();
        }
       // return $request->all();
       //$price_code=Auth::user()->shop->price_code;
       if ($barcode==null){
           return back();
       }
       $orderItem=OrderItem::where('order_id',$id)
       ->where(function($query) use ($barcode){
        
            $query->where('barcode',$barcode)->orWhere('code',$barcode);
       })->get();
       //return $orderItem->count();
        if($orderItem->count()==1){
            return view('orderItem',['data'=>$orderItem[0],'id'=>$id,'role'=>$role]);
       }else{
            return back();
         
       }  
        
     }

    public function orderAddItem(Request $request,$id){
        //return $request->all();
        $code=$request->input('code');
        $qty=$request->input('qty');
        $name=$request->input('name');
        $barcode=$request->input('barcode');
        if($qty==0){
            return redirect()->route('order',['id'=>$id]);
        }
        $itemInOrder=OrderItem::where('order_id',$id)->where("code",$code)->get();
        if ($itemInOrder->count()==0){

            $orderItem=OrderItem::create(
                [
                    "order_id"=>$id,
                    "code"=>$code,
                    "qty"=>$qty,
                    "name"=>$name,
                    "barcode"=>$barcode,
                    "qty_done"=>0
                ]
            );
        }else{
            OrderItem::where('id',$itemInOrder[0]->id)->update(["qty"=>$qty+$itemInOrder[0]->qty]);
        }
        //return $orderItem;
        
        
        return redirect()->route('order',['id'=>$id]);
    }

    public function collectAddItem(Request $request,$id){
        //return $request->all();
        $code=$request->input('code');
        $qty=$request->input('qty');
        //$name=$request->input('name');
        //$barcode=$request->input('barcode');
        if($qty==0){
            return redirect()->route('order',['id'=>$id]);
        }
        $itemInOrder=OrderItem::where('order_id',$id)->where("code",$code)->get();
        if ($itemInOrder->count()==0){

            return back();
        }else{
            OrderItem::where('id',$itemInOrder[0]->id)->update(["qty_done"=>$qty+$itemInOrder[0]->qty_done]);
        }
        //return $orderItem;
        return redirect()->route('order',['id'=>$id]);
    }

    public function orderStatus($id,$status){
        if($status=='sent'){
            
            $orderCount= OrderItem::where('order_id',$id)->count();
            if ($orderCount==0){
                return back();
            }
        }
        $order=Order::where('id',$id)->first();
        $order->status=$status;
        $order->save();

        $orderStatus=new OrderStatus();
        $orderStatus->user_id=Auth::user()->id;
        $orderStatus->order_id=$order->id;
        $orderStatus->status=$status;
        $orderStatus->save();

        return redirect()->route('orders');

    }
    public function orderDeleteItem($id,$item){
        $item=OrderItem::where('id',$item)->delete();
        return redirect()->route('order',['id'=>$id]);
    }
    public function orderEditItem($id){
        $role=Auth::user()->role->name;
        $item=OrderItem::where('id',$id)->get();
       //dd($item[0]);
        return view('orderItem',['data'=>$item[0],'id'=>$item[0]->order_id,'role'=>$role]);
    }
    public function orderDelete($id){
        try{
            $order=Order::where('id',$id)->delete();
        }catch(Exception $e){

        }
        return redirect()->route('orders');
    }
}

