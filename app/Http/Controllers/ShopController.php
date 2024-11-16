<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index(){
        $shops=Shop::get();
        return view('shops.index',compact('shops'));
    }
}
