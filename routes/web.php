<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\HistoryController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\ProductController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.dashboard');
});


Route::controller(RegisterController::class)->group(function() {
    Route::get('register', 'register')->name('register');
    Route::post('register_process', 'store')->name('register_process');
});

Route::controller(LoginController::class)->group(function() {
    Route::get('login', 'login')->name('login');
    Route::post('login_process', 'login_process')->name('login_process');
    Route::get('dashboard', 'dashboard')->name('dashboard');
    Route::post('logout', 'logout')->name('logout');
});

Route::group(['prefix'=>'product','as'=>'product.'], function(){
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/category/{id}', [ProductController::class, 'category'])->name('category');
});
Route::middleware('user')->group(function () {
    Route::get('/product/detail/{id}', [ProductController::class, 'show'])->name('detail');

    Route::group(['prefix'=>'cart','as'=>'cart.'], function(){
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/process', [CartController::class, 'store'])->name('process');
        Route::delete('/delete/{id}', [CartController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix'=>'order','as'=>'order.'], function(){
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::post('/store', [OrderController::class, 'store'])->name('store');
        // Route::post('/voucher', [OrderController::class, 'voucher'])->name('voucher');
    });
    
    Route::group(['prefix'=>'history','as'=>'history.'], function(){
        Route::get('/', [HistoryController::class, 'index'])->name('index');
        Route::get('/closed', [HistoryController::class, 'closed'])->name('closed');
        Route::get('/open', [HistoryController::class, 'open'])->name('open');
    });
    
    
    
});

