<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PriceController;
use App\Http\Controllers\CollectController;
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
    return view('index', ['title' => 'Dashboard']);
})->middleware('auth')->name('main');

Auth::routes();

Route::get('/home', [PriceController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth', 'prefix' => 'price', 'as' => 'price.'], function () {

    Route::get('', [PriceController::class, 'index'])->name('index');

    Route::get('/item', [PriceController::class, 'item'])->name('item');

    Route::get('/additem', [PriceController::class, 'additem'])->name('add.item');

    Route::get('/dellitem', [PriceController::class, 'dellitem'])->name('dell.item');

    Route::get('/load1c', [PriceController::class, 'load1c'])->name('load1c');
});


Route::group(['middleware' => 'auth', 'prefix' => 'orders', 'as' => 'orders.'], function () {

    Route::get('', [OrderController::class, 'index'])->name('index');

    Route::get('/create', [OrderController::class, 'orderCreate'])->name('create');

    Route::get('/ready', [OrderController::class, 'readyOrders'])->name('ready');


    Route::get('/edit/item/{id}', [OrderController::class, 'orderEditItem'])->name('edit.item');

    Route::get('/{id}', [OrderController::class, 'order'])->name('show');

    Route::get('/{id}/delete', [OrderController::class, 'orderDelete'])->name('delete');

    Route::post('/{id}/item', [OrderController::class, 'orderItem'])->name('item');

    Route::post('/{id}/add/item', [OrderController::class, 'orderAddItem'])->name('add.item');

    Route::post('/{id}/check/item', [OrderController::class, 'checkItem'])->name('check.item');
  
    Route::get('/{id}/status/{status}', [OrderController::class, 'orderStatus'])->name('status');

    Route::get('/{id}/delete/{item}', [OrderController::class, 'orderDeleteItem'])->name('delete.item');
});


Route::group(['middleware' => 'auth', 'prefix' => 'collects', 'as' => 'collects.'], function () {

    Route::get('', [CollectController::class, 'index'])->name('index');

    Route::get('/{id}', [CollectController::class, 'collect'])->name('show');

    Route::get('item/{id}/edit',[CollectController::class,'editItem'])->name('edit.item');

    Route::post('/{id}/check/item', [CollectController::class, 'checkItem'])->name('check.item');

    Route::post('/{id}/collect/item', [OrderController::class, 'orderCollectItem'])->name('collect.item');    

    Route::get('/{id}/status/{status}', [CollectController::class, 'collectStatus'])->name('status');

});

Route::group(['middleware' => 'auth', 'prefix' => 'users', 'as' => 'users.'], function () {
    
    Route::get('', [UserController::class, 'index'])->name('index');

    Route::get('/add', [UserController::class, 'add'])->name('add');

    Route::post('/add', [UserController::class, 'store'])->name('store');

    Route::get('/{id}', [UserController::class, 'show'])->name('show');

    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');

   
});

Route::get('/shops', [ShopController::class, 'index'])->name('shops.index');

Route::get('/shops/update', [ShopController::class, 'update'])->name('shops.update');

Route::get('/adines', [AdinesController::class, 'index'])->name('adines.index');

//Route::get('/monitoring',[MonitoringController::class,'index'])->name('monitoring');

Route::get('/logout', [PriceController::class, 'logout'])->name('logout');
