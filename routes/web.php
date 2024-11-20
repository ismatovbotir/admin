<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PriceController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AdinesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index',['title'=>'Dashboard']);
})->middleware('auth')->name('main');

Auth::routes();

Route::get('/home', [PriceController::class, 'index'])->name('home');


Route::group(['middleware'=>'auth','prefix'=>'price','as'=>'price.'],function(){

    Route::get('', [PriceController::class, 'index'])->name('index');

    Route::get('/item', [PriceController::class, 'item'])->name('item');

    Route::get('/additem', [PriceController::class, 'additem'])->name('add.item');

    Route::get('/dellitem', [PriceController::class, 'dellitem'])->name('dell.item');

    Route::get('/load1c',[PriceController::class, 'load1c'])->name('load1c');
});


Route::group(['middleware'=>'auth','prefix'=>'orders','as'=>'orders.'],function(){
    
    Route::get('',[OrderController::class,'orders'])->name('index');

    Route::get('/create',[OrderController::class,'orderCreate'])->name('create');

    Route::get('/ready',[OrderController::class,'readyOrders'])->name('ready');

    
    Route::get('/edit/item/{id}',[OrderController::class,'orderEditItem'])->name('edit.item');

    Route::get('/{id}',[OrderController::class,'order'])->name('show');

    Route::get('/{id}/delete',[OrderController::class,'orderDelete'])->name('delete');

    Route::post('/{id}/item',[OrderController::class,'orderItem'])->name('item');

    Route::post('/{id}/add/item',[OrderController::class,'orderAddItem'])->name('add.item');

    Route::post('/{id}/check/item',[OrderController::class,'checkItem'])->name('check.item');

    Route::post('/{id}/addCollectItem',[OrderController::class,'collectAddItem'])->name('collect.add.Item');

    

    Route::get('/{id}/status/{status}',[OrderController::class,'orderStatus'])->name('status');

    Route::get('/{id}/delete/{item}',[OrderController::class,'orderDeleteItem'])->name('delete.item');

    
});



Route::get('/users',[UserController::class,'index'])->name('users.index');

Route::get('/users/add',[UserController::class,'add'])->name('users.add');

Route::get('/user/{id}',[UserController::class,'show'])->name('users.show');

Route::get('/user/{id}/edit',[UserController::class,'edit'])->name('users.edit');

Route::post('/user/add',[UserController::class,'store'])->name('users.store');




Route::get('/shops',[ShopController::class,'index'])->name('shops.index');

Route::get('/shops/update',[ShopController::class,'update'])->name('shops.update');

Route::get('/adines',[AdinesController::class,'index'])->name('adines.index');

//Route::get('/monitoring',[MonitoringController::class,'index'])->name('monitoring');

Route::get('/logout',[PriceController::class,'logout'])->name('logout');