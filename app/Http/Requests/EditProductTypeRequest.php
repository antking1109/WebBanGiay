<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditProductTypeRequest extends FormRequest
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
            'txtSlug' => 'unique:product_types,slug,' . $this->id,
        ];
    }

    /**
     * Config errors message
     */
    public function messages()
    {
        return [
            'txtName.required'  =>  'Tên không được để trống',
            'txtSlug.required'  =>  'Đường dẫn không được để trống',
            'txtSlug.unique'    =>  'Đường dẫn đã tồn tại',
        ];
    }
}
