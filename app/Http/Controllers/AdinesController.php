<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adines;

class AdinesController extends Controller
{
    public function index(){
        $adines=Adines::first();
        //dd($adines);
        return view('adines',compact('adines'));
    }
}
