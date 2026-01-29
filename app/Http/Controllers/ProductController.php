<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckTimeAccess;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function middleware(){
        return [
            CheckTimeAccess::class,
        ];
    }
    public function index()
    {
        $title = "Product List";
        return view('products.index',['title' => $title,
        'products' => [
            ['name' => 'Product 1', 'price' => 100],
            ['name' => 'Product 2', 'price' => 200],
            ['name' => 'Product 3', 'price' => 300]
        ]]);
    }
    public function getDetail($id = '123')
    {
        return view('products.detail', ['id' => $id]);
    }
    public function create() {
        return view('products.add');
    }
    public function store(Request $request) {
        return $request->all();
    }
}