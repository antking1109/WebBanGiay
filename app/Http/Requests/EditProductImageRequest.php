<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductImageRequest extends FormRequest
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
            'txtTitle'  =>  'required',
            'txtAlt'    =>  'required'
        ];
    }

    /**
     * Custom show error messages
     *
     * @return array
    */
    public function messages(){
        return [
            'txtTitle.required' =>  'Vui lòng nhập tiêu đề',
            'txtAlt.required'   =>  'Vui lòng nhập mô tả'
        ];
    }
}
