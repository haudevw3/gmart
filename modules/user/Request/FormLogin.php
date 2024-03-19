<?php

namespace Modules\User\Request;

use App\Http\Requests\FormRequest;

class FormLogin extends FormRequest
{
    public function __construct()
    {
    }
    
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
            'username' => 'required|min:6|max:30',
            'password' => 'required|min:6'
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
            'username.required' => 'Tên đăng nhập không được bỏ trống',
            'username.min' => 'Tên đăng nhập tối thiểu 6 kí tự',
            'username.max' => 'Tên đăng nhập tối đa 30 kí tự',
            'password.required' => 'Mật khẩu không được bỏ trống',
            'password.min' => 'Mật khẩu tối thiểu 6 kí tự',
        ];
    }
}
