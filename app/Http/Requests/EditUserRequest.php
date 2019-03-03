<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'txtEmail'  =>  'required|email|unique:users,email,'.$this->route('id'),
            'txtPass2'  =>  'same:txtPass1',
        ];
    }

    /**
     * Config errors message
     */
    public function messages()
    {
        return [
            'txtName.required'  =>  'Tên không được để trống',
            'txtEmail.required' =>  'Email không được để trống',
            'txtEmail.unique'   =>  'Email đã tồn tại',
            'txtEmail.email'    =>  'Vui lòng nhập vào phải là email',
            'txtPass2.same'     =>  '2 mật khẩu nhập không khớp',
        ];
    }
}
