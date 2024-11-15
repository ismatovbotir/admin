<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
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
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/price', [App\Http\Controllers\HomeController::class, 'index'])->name('price');

Route::get('/item', [App\Http\Controllers\HomeController::class, 'item'])->name('item');

Route::get('/additem', [App\Http\Controllers\HomeController::class, 'additem'])->name('additem');

Route::get('/dellitem', [App\Http\Controllers\HomeController::class, 'dellitem'])->name('dellitem');


Route::get('/load1c',[App\Http\Controllers\HomeController::class, 'load1c'])->name('load1c');

Route::get('/orders',[OrderController::class,'orders'])->name('orders');

Route::get('/order/{id}',[OrderController::class,'order'])->name('order');

Route::get('/order/{id}/delete',[OrderController::class,'orderDelete'])->name('orderDelete');

Route::post('/order/{id}/item',[OrderController::class,'orderItem'])->name('orderItem');

Route::post('/order/{id}/addItem',[OrderController::class,'orderAddItem'])->name('orderAddItem');

Route::post('/order/{id}/checkItem',[OrderController::class,'checkItem'])->name('checkItem');

Route::post('/order/{id}/addCollectItem',[OrderController::class,'collectAddItem'])->name('collectAddItem');

Route::get('/orderCreate',[OrderController::class,'orderCreate'])->name('orderCreate');

Route::get('/orderStatus/{id}/{status}',[OrderController::class,'orderStatus'])->name('orderStatus');

Route::get('/orderDeleteItem/{id}/{item}',[OrderController::class,'orderDeleteItem'])->name('orderDeleteItem');

Route::get('/orderEditItem/{id}',[OrderController::class,'orderEditItem'])->name('orderEditItem');

Route::get('/users',[UserController::class,'index'])->name('users.index');

Route::get('/monitoring',[MonitoringController::class,'index'])->name('monitoring');