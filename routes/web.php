<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('Home');
});

//login
Route::get('/login', [ProductController::class, 'login']);
Route::post('/login', [ProductController::class, 'checkLogin']);


//Products (Controller)

// Danh sách
Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

// Form thêm
Route::get('/products/create', [ProductController::class, 'create'])
    ->name('products.add');

// Xử lý thêm
Route::post('/products', [ProductController::class, 'store'])
    ->name('products.store');

// Chi tiết
Route::get('/products/{id}', [ProductController::class, 'getDetail'])
    ->name('products.detail');


//sinvien
Route::get('/sinhvien/{name?}/{mssv?}', function ($name = 'Tran Huy Hoang', $mssv = '0031267') {
    return view('sinhvien', compact('name', 'mssv'));
});

//co
Route::get('/banco/{n}', function ($n) {
    return view('banco', compact('n'));
});

//404
Route::fallback(function () {
    return view('error.404');
});
