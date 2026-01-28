<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\CheckTimeAccess;

/*
|--------------------------------------------------------------------------
| Routes không liên quan product → GIỮ NGUYÊN
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('Home');
});

// login
Route::get('/login', [ProductController::class, 'login']);
Route::post('/login', [ProductController::class, 'checkLogin']);

// sinhvien
Route::get('/sinhvien/{name?}/{mssv?}', function ($name = 'Tran Huy Hoang', $mssv = '0031267') {
    return view('sinhvien', compact('name', 'mssv'));
});

// banco
Route::get('/banco/{n}', function ($n) {
    return view('banco', compact('n'));
});

/*
|--------------------------------------------------------------------------
| Product Routes → gom nhóm + middleware
|--------------------------------------------------------------------------
*/

Route::prefix('products')
    ->middleware(CheckTimeAccess::class)
    ->controller(ProductController::class)
    ->group(function () {

        // Danh sách
        Route::get('/', 'index')->name('products.index');

        // Form thêm
        Route::get('/create', 'create')->name('products.add');

        // Xử lý thêm
        Route::post('/', 'store')->name('products.store');

        // Chi tiết
        Route::get('/{id}', 'getDetail')->name('products.detail');
    });

// 404
Route::fallback(function () {
    return view('error.404');
});
