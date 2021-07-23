<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'user' => 'required|unique:posts|min:6|max:15',
            'pass' => 'required|min:6|max:32',
            're-pass' =>'required|same:pass',
            'email' =>'requied|email',
        ];
    }

    public function messages()
    {
        
        return [
            'name.required' => 'Vui lòng nhập họ tên',
            'user.required' => 'Vui lòng nhập tài khoản',
            'pass.required' => 'Vui lòng nhập mật khẩu',
            're-pass.required' => 'Vui lòng xác nhận lại mật khẩu',
            'email.required' => "Vui lòng nhập email",
            'name.max' => 'Họ tên không vượt quá 50 ký tự',
            'user.min' => 'Tài khoản phải có độ dài 6 ký tự trở lên',
            'user.max' => 'Tài khoản có độ dài dưới 15 ký tự',
            'pass.min' => 'Mật khẩu có độ dài từ 6 ký tự',
            'pass.max' => 'Mật khẩu có độ dài dưới 32 ký tự',
            're-pass.same' => 'Xác nhận mật khẩu không trùng khớp',
            'email' => 'Email không đúng định dạng',
        ];
    }
}
