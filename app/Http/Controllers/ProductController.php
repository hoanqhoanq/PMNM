<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $title = 'Products List';

        $products = [
            ['id' => 1, 'name' => 'A', 'price' => 123],
            ['id' => 2, 'name' => 'B', 'price' => 456],
            ['id' => 3, 'name' => 'C', 'price' => 789],
        ];

        return view('products.index', [ 'title' => $title, 'products' => $products ]);
    }

    public function getDetail($id)
    {
        return view('products.detail', ['id' => $id]);
    }

     public function create()
    {
        return view('products.add');
    }

     public function store(Request $request)
    {
        return $request->all();
    }

    
public function checkLogin(Request $request)
    {
        if (
            $request->input('username') === 'hoangth' &&
            $request->input('password') === '23052004'
        ) {
            return "chuc mung ban dang nhap thanh cong :))";
        }

        return "thất bại";
    }
public function login()
{
    return view('login');
}

}
