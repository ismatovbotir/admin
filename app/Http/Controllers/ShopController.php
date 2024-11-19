<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Adines;
use Illuminate\Support\Facades\Http;

class ShopController extends Controller
{
    public function index(){
        $shops=Shop::get();
        //dd($shops);
        return view('shops.index',compact('shops'));
    }

    public function update(){

        $adines=Adines::first();
        $auth=base64_encode($adines->login.':'.$adines->password);
        $response = Http::withHeaders([
            'Authorization' => 'Basic '.$auth,
            'Cache-Control'=>'no-cache',
            'Content-Type'=>'application/json'
  
        ])->get($adines->adress.'warehouse');
        //return $response;
        $res=$response->json();
        //dd($res);
         if($res["code"]==0){
            $shops=$res['data'];    
        
          //return view('orderItem',['data'=>$res['data'],'id'=>$id,'role'=>$role]);
        }  
        
        
        // $shops=[
        //     ["shop_name"=>"Fresh 1","shop_code"=>"000002","price_code"=>"00002","price_name"=>"fresh 1 name"]
        // ];

        Shop::upsert(
            $shops,
            ['shop_code'],
            ['shop_name']
        );
        return redirect()->route('shops.index');
    }
}



