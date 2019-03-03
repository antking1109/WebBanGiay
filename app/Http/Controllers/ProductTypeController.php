<?php
/**
 * @author: TruongTC
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\ProductType;
use App\Http\Requests\AddProductTypeRequest;
use App\Http\Requests\EditProductTypeRequest;
use DB;

class ProductTypeController extends Controller
{
    /**
     * @desc: Get all product type
     * @return: \Illuminate\Http\Response
     */
    public function index()
    {
        $product_types = ProductType::get();

        return view('admin.product_type.list')->with('product_types', $product_types);
    }

    /**
     * @desc: Create single product type
     * @param: \App\Http\Request\AddProductTypeRequest
     * @return: \Illiminate\Http\Response
     */
    public function store(AddProductTypeRequest $request)
    {
        $product_type = new ProductType;
        $product_type->title = $request->txtName;

        // Create a url slug from name of product type
        $slug = Str::slug($request->txtName, '-');
        $slug_count_exist = DB::table('product_types')
                                ->selectRaw('COUNT(*) as slug_count')
                                ->whereRaw("slug LIKE '" . $slug . "%' OR slug = '" . $slug . "'")
                                ->first()->{'slug_count'};
        if ($slug_count_exist == 0) {
            $product_type->slug = $slug;
        } else {
            $product_type->slug = $slug . "-" . ($slug_count_exist + 1);
        }
        $product_type->save();
        
        return redirect()->route('product_type.show')->with('add-success', 'Bạn đã thêm thành công');
    }

    /**
     * @desc: Show single product type
     * @param: $id (Product Type ID)
     * @return: \Illiminate\Http\Response
     */
    public function show($id)
    {
        $product_type = ProductType::findOrFail($id);
        
        return view('admin.product_type.edit')->with('product_type', $product_type);
    }

    /**
     * @desc: Update single product type
     * @param: $id (Product Type ID), \App\Requests\EditProductTypeRequest
     * @return: \Illiminate\Http\Response
     */
    public function update(EditProductTypeRequest $request, $id)
    {
        $product_type = ProductType::findOrFail($id);
        $product_type->title = $request->txtName;
        $product_type->slug  = $request->txtSlug;
        $product_type->save();
        
        return back()->withInput()->with('success','Sửa thành công!');
    }

    /**
     * @desc: Delete single product type
     * @param: $id Product Type ID
     * @return: \Illiminate\Http\Response
     */
    public function destroy($id)
    {
        $product_type = ProductType::findOrFail($id);
        $product_type->delete();
        
        return back()->with('message', 'Bạn đã xóa thành công');
    }
}
