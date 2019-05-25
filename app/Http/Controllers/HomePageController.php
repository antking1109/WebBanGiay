<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;

class HomePageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *Show all info in home page
     */
    public function index(){
        $products = Product::orderBy('id', 'desc')->paginate(12);
        $categories = ProductType::all();
        return view('index')->with(['products' => $products,'categories' => $categories]);
    }

    /**
     *Show all product by type
     * @param $slug Slug product type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProductsByCategory($slug){
        $category = ProductType::where('slug','=',$slug)->firstOrFail();
        return view('category')->with('category',$category);
    }
}
