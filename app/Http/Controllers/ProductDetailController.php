<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductDetailRequest;
use App\ProductDetail;
use Illuminate\Http\Request;
use App\Product;

class ProductDetailController extends Controller
{
    /**
     * @desc: Show all product detail
     * @param: $id Product ID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View : \Illuminate\Http\Responses
     */
    public function index($id)
    {
        $product = Product::findOrFail($id);
        $product_details = $product['productDetails'];
        return view('admin.product_detail.list')->with(['product_details'=>$product_details,'product'=>$product]);
    }

    /**
     * @desc: Show view add product detail
     * @param: $id Product ID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View : \Illuminate\Http\Responses
     */
    public function create($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.product_detail.add')->with('product',$product);
    }

    /**
     * @desc: create single product detail
     * @param AddProductDetailRequest $request
     * @param: $id Product ID
     * @return \Illuminate\Http\RedirectResponse : \Illuminate\Http\Responses
     */
    public function store(AddProductDetailRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product_detail = new ProductDetail;
        $product_detail->size = $request->txtSize;
        $product_detail->color = $request->txtColor;
        $product_detail->quantity = $request->txtQuantity;
        $product_detail->product_id = $product->id;
        $product_detail->save();

        return redirect()->route('product_detail.index', $id)->with('add-success', 'Bạn đã thêm thành công');
    }

    /**
     * @desc: delete single product detail
     * @param: $id Product Detail ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $product_detail = ProductDetail::findOrFail($id);
        $product_detail->delete();

        return back()->with('message', 'Bạn đã xóa thành công');
    }

    /**
     * @desc show single product detail
     * @param $id Product Detail ID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $product_detail = ProductDetail::findOrFail($id);

        return view('admin.product_detail.edit')->with('product_detail',$product_detail);
    }

    /**
     * @desc update single product detail
     * @param AddProductDetailRequest $request
     * @param $id Product Detail ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AddProductDetailRequest $request,$id)
    {
        $product_detail = ProductDetail::findOrFail($id);
        $product_detail->size = $request->txtSize;
        $product_detail->color = $request->txtColor;
        $product_detail->quantity = $request->txtQuantity;
        $product_detail->save();
        return back()->withInput()->with('success','Sửa thành công!');
    }
}
