<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductDetailController extends Controller
{
    /**
     * @desc: Show all product detail
     * @param: $id Product ID
     * @return: \Illuminate\Http\Responses
     */
    public function index($id)
    {
        $product = Product::findOrFail($id);
        $product_details = $product['productDetails'];
        
        return view('admin.product_detail.list')->with(['product_details'=>$product_details,'product'=>$product]);
    }

    /**
     * @desc: create single product detail
     * @param: $id Product ID
     * @return: \Illuminate\Http\Responses
     */
    public function store($id)
    {
        
    }
}
