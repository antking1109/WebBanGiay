<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use Illuminate\Support\Facades\DB;

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

    /**
     * Show product
     */
    public function showProduct($slug){
        $product = Product::where('slug','=',$slug)->firstOrFail();
        $has_sizes = DB::select('SELECT size FROM product_details pd INNER JOIN products p ON pd.product_id = p.id WHERE p.id = ? GROUP BY pd.size',[$product['id']]);
        $has_colors = DB::select('SELECT color FROM product_details pd INNER JOIN products p ON pd.product_id = p.id WHERE p.id = ? GROUP BY pd.color',[$product['id']]);
        return view('product')->with(['product' => $product,'has_sizes' => $has_sizes,'has_colors' => $has_colors]);
    }
}
