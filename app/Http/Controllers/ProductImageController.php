<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductImageRequest;
use App\Http\Requests\EditProductImageRequest;
use App\Image;
use App\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class ProductImageController extends Controller
{
    /**
     * @desc: Show all product image
     * @param: $id Product ID
     * @return Factory|View :
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
     * @return: \Illuminate\Contracts\View\Factory|\Illuminate\View\View :
     */
    public function create($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product_image.add')->with('product',$product);
    }

    /**
     * @desc: create single product image
     * @param AddProductImageRequest $request
     * @param: $id Product ID
     * @return void :
     * @doing: chưa tạo request
     */
    public function store(AddProductImageRequest $request, $id){
        $product = Product::findOrFail($id);
        $product_image = new Image();
        $product_image->title = $request->txtTitle;

        //Lấy đuôi file
        $fileExtension = $request->fileImage->getClientOriginalExtension();
        // Filename cực shock để khỏi bị trùng
        $fileName = time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." . $fileExtension;
        // Thư mục upload
        $uploadPath = public_path('/upload');
        // Bắt đầu chuyển file vào thư mục
        $request->fileImage->move($uploadPath, $fileName);

        $product_image->slug = '/upload/' . $fileName;
        $product_image->alt = $request->txtAlt;
        $product_image->product_id = $product['id'];
        $product_image->save();

        return redirect()->route('product_image.index', $id)->with('add-success', 'Bạn đã thêm thành công');
    }

    /**
     * @desc: show single product image
     * @param: $id Image ID
     * @return Factory|View : admin.product_image.edit
     */
    public function show($id){
        $product_image = Image::findOrFail($id);
        $product = Product::findOrFail($product_image->product_id);
        return view('admin.product_image.edit')->with(['product_image' => $product_image,'product'  =>  $product]);
    }

    /**
     * update info product image by id
     */
    public function update(EditProductImageRequest $request, $id){
        $product_image = Image::findOrFail($id);
        $product_image->title = $request->txtTitle;
        $product_image->alt = $request->txtAlt;
        $product_image->save();
        return back()->withInput()->with('success','Sửa thành công!');
    }

    /**
     * @desc: Delete image by id
     * @param: $id Image ID
     * @return: Return to the previous page with message
     */
    public function destroy($id){
        $product_image = Image::findOrFail($id);
        $product_image->delete();

        return back()->with('message', 'Bạn đã xóa thành công');
    }
}
