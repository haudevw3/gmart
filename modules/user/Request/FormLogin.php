<?php

namespace Modules\User\Request;

use App\Http\Requests\FormRequest;

class FormLogin extends FormRequest
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
            'username' => 'min:6|max:30',
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
            'username.min' => 'Tên đăng nhập tối thiểu 6 kí tự',
            'username.max' => 'Tên đăng nhập tối đa 30 kí tự',
            'password.min' => 'Mật khẩu tối thiểu 6 kí tự',
            'password.max' => 'Mật khẩu tối đa 30 kí tự'
        ];
    }
}
