<?php

namespace App\Http\Requests;

abstract class FormRequest
{
    /**
     *  Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    abstract public function authorized();

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    abstract public function rules();

    /**
     * Set error messages for rules
     * 
     * @return array
     */
    abstract public function messages();
}