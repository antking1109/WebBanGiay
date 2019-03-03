<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'txtEmail'  =>  'required|email|unique:users,email',
            'txtPass1'   =>  'required|min:6',
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
            'txtEmail.email'    =>  'Vui lòng nhập vào phải là email (xxx@xxx.xxx)',
            'txtPass1.required' =>  'Mật khẩu không được để trống',
            'txtPass1.min'      =>  'Mật khẩu tối thiểu 6 ký tự',
            'txtPass2.same'     =>  '2 mật khẩu nhập không khớp',
        ];
    }
}
