<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\CheckTimeAccess;
use App\Http\Middleware\CheckAgeAccess;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/test', function () {
    return response()->json(['message' => 'This is a test route']);
});
route::fallback(function(){
    return view('error.404');
});
route::get('/sinhvien/{name?}/{mssv?}', function($name = "Luong Xuan Hieu", $mssv = "123456"){
    return "Hello ban $name, MSSV: $mssv";
});
Route::get('/banco/{n}', function (int $n) {
    return view('banco', ['n' => $n]);
});

Route::prefix('product')->group(function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get('/', 'index')->middleware(CheckTimeAccess::class);
        Route::get('/detail/{id}', 'getDetail');
        Route::get('/create', 'create')->name('add');
        Route::post('/store', 'store');
    });
});
Route::prefix('auth')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/signin', 'SignIn')->name('auth.signin');
        Route::post('/checkSignIn', 'CheckSignIn')->middleware(CheckAgeAccess::class)->name('auth.checkSignIn');
        Route::get('/age', 'age')->name('auth.age');
        Route::post('/storeAge', 'storeAge')->middleware(CheckAgeAccess::class)->name('auth.storeAge');
    });
});
Route::resource('test',TestController::class);