<?php

namespace Modules\User\Request;

use App\Http\Requests\FormRequest;

class FormRegister extends FormRequest
{
    /**
     *  Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorized()
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
            'fullname' => 'min:6|max:50',
            'username' => 'unique:users|min:6|max:30',
            'phone' => 'phone|min:10',
            'email' => 'email',
            'password' => 'min:6|max:30'
        ];
    }

    /**
     * Set error messages for rules
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'fullname.min' => 'Họ và tên tối thiểu 6 kí tự',
            'fullname.max' => 'Họ và tên tối đa 50 kí tự',
            'username.unique' => 'Tên đăng nhập đã tồn tại',
            'username.min' => 'Tên đăng nhập tối thiểu 6 kí tự',
            'username.max' => 'Tên đăng nhập tối đa 30 kí tự',
            'phone.phone' => 'Số điện thoại không hợp lệ',
            'phone.min' => 'Số điện thoại tối thiểu 10 kí tự',
            'email.email' => 'Email không đúng định dạng',
            'password.min' => 'Mật khẩu tối thiểu 6 kí tự',
            'password.max' => 'Mật khẩu tối đa 30 kí tự'
        ];
    }
}
