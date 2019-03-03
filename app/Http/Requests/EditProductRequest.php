<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'txtName'   =>  'required',
            'txtSlug' => 'required|unique:products,slug,' . $this->id,
            'txtDescription'    =>  'required',
            'txtTrademark'      =>  'required',
            'txtPrice'          =>  'required|numeric',
            'txtPromotionPrice' =>  'required|numeric',
            'ddlProductType'    =>  'required',
        ];
    }

    /**
     * Config content message errors
     */
    public function messages()
    {
        return [
            'txtName.required'              =>  'Tên không được để trống',
            'txtSlug.required'              =>  'Vui lòng nhập đường dẫn',
            'txtTrademark'                  =>  'Thương hiệu không được để trống',
            'txtSlug.unique'                =>  'Đường dẫn bạn nhập đã tồn tại vui lòng nhập lại',
            'txtDescription.required'       =>  'Mô tả sản phẩm không được để trống',
            'txtPrice.required'             =>  'Giá bán không được để trống',
            'txtPrice.numeric'              =>  'Giá bán nhập vào phải là số',
            'txtPromotionPrice.numeric'     =>  'Giá khuyến mãi phải là số',
            'txtPromotionPrice.required'    =>  'Giá khuyến mãi bắt buộc phải nhập. Nếu không có khuyến mãi vui lòng nhập bằng giá bán',
            'ddlProductType'                =>  'Vui lòng chọn loại sản phẩm. Nếu không có vui lòng thêm loại sản phẩm trước khi thêm sản phẩm',
        ];
    }
}
