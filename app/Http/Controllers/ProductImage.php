<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductImage extends Controller
{
    /**
     * @desc: Show all product image
     * @param: $id Product ID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View :
     */
    public function index($id)
    {
        $product = Product::findOrFail($id);
        $product_images = $product['images'];
        return view('admin.product_image.list')->with(['product_images'=>$product_images,'product'=>$product]);
    }

    /**
     * @desc: Show view add product image
     * @param: $id Product ID
     * @return:
     */
    public function create($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product_image.add')->with('product',$product);
    }

    /**
     * @desc: create single product image
     * @param:
     * @return:
     * @doing: chưa tạo request
     */
    public function store(AddProductImageRequest $request, $id)
}
