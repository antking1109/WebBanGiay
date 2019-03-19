<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductDetailRequest extends FormRequest
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
            'txtSize'       => 'required|numeric',
            'txtColor'      =>  'required',
            'txtQuantity'   =>  'required|numeric'
        ];
    }

    /**
     * @desc: Config message content
     * @return array
     */
    public function messages()
    {
        return [
            'txtSize.required'      =>  'Vui lòng chọn size',
            'txtSize.numeric'       =>  'Size phải là số',
            'txtColor.required'     =>  'Vui lòng nhập màu sắc',
            'txtQuantity.required'  =>  'Vui lòng nhập số lượng',
            'txtQuantity.numeric'   =>  'Số lượng nhập vào phải là số'
        ];
    }
}
