<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index(){
        $shops=Shop::get();
        //dd($shops);
        return view('shops.index',compact('shops'));
    }

    public function update(){
        $shops=[
            ["shop_name"=>"Fresh 1","shop_code"=>"000002","price_code"=>"00002","price_name"=>"fresh 1 name"]
        ];

        Shop::upsert(
            $shops,
            ['shop_code'],
            ['shop_name']
        );
        return redirect()->route('shops.index');
    }
}



