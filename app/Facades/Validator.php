<?php

namespace App\Facades;

class Validator
{
    public function __construct()
    {
    }

    public static function make($data = [], $rules = [], $customFields = [])
    {
        global $regex;
        $messages = [];
        $isValidate = 1;
        foreach ($rules as $field => $ruleItem) :
            foreach ($ruleItem as $key => $value) :
                switch ($key) {
                    case 'required':
                        if (strlen($data[$field]) == 0) :
                            $isValidate = 0;
                            $messages[$field]['required'] = "$customFields[$field] không được bỏ trống";
                        endif;
                        break;

                    case 'min':
                        if (strlen($data[$field]) > 0 && strlen($data[$field]) < $value) :
                            $isValidate = 0;
                            $messages[$field]['min'] = "$customFields[$field] tối thiểu $value kí tự";
                        endif;
                        break;

                    case 'max':
                        if (strlen($data[$field]) > $value) :
                            $isValidate = 0;
                            $messages[$field]['max'] = 1;
                            $messages[$field]['max'] = "$customFields[$field] tối đa $value kí tự";
                        endif;
                        break;

                    case 'one':
                        if (!preg_match($regex['one'], $data[$field])) :
                            $isValidate = 0;
                            $messages[$field]['one'] = "$customFields[$field] không hợp lệ";
                        endif;
                        break;
                }
            endforeach;
        endforeach;
        $messages['isValidate'] = $isValidate;
        return $messages;
    }
}
