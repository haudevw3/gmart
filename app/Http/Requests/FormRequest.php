<?php

namespace App\Http\Requests;

use App\Facades\Validator;

abstract class FormRequest extends Request
{
    protected $rules;
    protected $messages;
    protected $authorized;

    public function __construct()
    {
        $this->rules = $this->rules();
        $this->messages = $this->messages();
        $this->authorized = $this->authorized();
    }

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

    public function validated()
    {
        if (!empty($this->rules)) :
            foreach ($this->rules as $field => $rule) :
                $ruleItems = explode('|', $rule);
                foreach ($ruleItems as  $item) :
                    $ruleItem = explode(':', $item);
                    if (count($ruleItem) > 1) :
                        $ruleArray[$field][$ruleItem[0]] = $ruleItem[1];
                    else :
                        $ruleArray[$field][$ruleItem[0]] = $ruleItem[0];
                    endif;
                endforeach;
            endforeach;
            $data = $this->all();
            $messages = Validator::make($data, $ruleArray, $this->messages);
            return $messages;
        endif;
    }
}
