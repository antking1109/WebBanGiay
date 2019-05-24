<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){
        $products = Product::orderBy('id', 'desc')->paginate(16);
        $categories = ProductType::all();
        return view('index')->with(['products' => $products,'categories' => $categories]);
    }
}
