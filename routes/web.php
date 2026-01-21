<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
});
Route::prefix('products')->group(function () {
    Route::get('/', function () {
        return view('products.index');
    });
    Route::get('/add', function () {
        return view('products.add');
    });
    Route::get('/{id?}', function ($id = '123') {
        return view('products.show', ['id' => $id]);
    });
});
Route::get('/sinhvien/{name?}/{mssv?}', function ($name = 'Tran Huy Hoang', $mssv = '0031267') {
    return view('sinhvien', ['name' => $name, 'mssv' => $mssv]);
});
Route::get('/banco/{n}', function ($n) {
    return view('banco', ['n' => $n]);
});
Route::fallback(function () {
    return view('error.404');
});