<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * @desc: Show all product
     * @return: Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();

        return view('admin.product.list')->with('products', $products);
    }

    /**
     * @desc: Create single product 
     * @param: \App\Http\Request\AddProductRequest
     * @return: \Illiminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
        $product = new Product;
        $product->title = $request->txtName;

        /**
         * Kiểm tra slug nếu đã tồn tại trong csdl giống phần đầu
         * thì sẽ đếm số bản ghi đó
         * thêm vào slug đuối "-" cộng thêm số đã đếm được ở trên + 1
         */
        $slug = Str::slug($request->txtName, '-');
        $slug_count_exist = DB::table('products')
                                ->selectRaw('COUNT(*) as slug_count')
                                ->whereRaw("slug LIKE '" . $slug . "%' OR slug = '" . $slug . "'")
                                ->first()->{'slug_count'};
        if ($slug_count_exist == 0) {
            $product->slug = $slug;
        } else {
            $product->slug = $slug . "-" . ($slug_count_exist + 1);
        }
        $product->save();
        
        return redirect()->route('product.show')->with('add-success', 'Bạn đã thêm thành công');
    }

    /**
     * @desc: Show single product
     * @param: $id (Product ID)
     * @return: \Illiminate\Http\Response
     */
    public function show($id)
    {
        $product = ProductType::findOrFail($id);
        
        return view('admin.product.edit')->with('product', $product);
    }

    /**
     * @desc: Update single product
     * @param: $id (Product ID), \App\Requests\EditProductRequest
     * @return: \Illiminate\Http\Response
     */
    public function update(EditProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->title = $request->txtName;
        $product->slug  = $request->txtSlug;
        $product->save();
        
        return back()->withInput()->with('success','Sửa thành công!');
    }

    /**
     * @desc: Delete single product
     * @param: $id Product ID
     * @return: \Illiminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        
        return back()->with('message', 'Bạn đã xóa thành công');
    }
}
