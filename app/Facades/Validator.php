<?php

namespace App\Facades;

use App\Singletons\Singleton;

class Validator extends Singleton
{
    public function __construct()
    {
    }

    public static function make($data = [], $rules = [], $customFields = [])
    {
        global $regex;
        $message = [];
        $isValidate = 1;
        foreach ($rules as $field => $ruleItem) :
            foreach ($ruleItem as $key => $value) :
                switch ($key) {
                    case 'required':
                        if (strlen($data[$field]) == 0) :
                            $isValidate = 0;
                            $message[$field]['required'] = "$customFields[$field] không được bỏ trống";
                        endif;
                        break;

                    case 'min':
                        if (strlen($data[$field]) > 0 && strlen($data[$field]) < $value) :
                            $isValidate = 0;
                            $message[$field]['min'] = "$customFields[$field] tối thiểu $value kí tự";
                        endif;
                        break;

                    case 'max':
                        if (strlen($data[$field]) > $value) :
                            $isValidate = 0;
                            $message[$field]['max'] = 1;
                            $message[$field]['max'] = "$customFields[$field] tối đa $value kí tự";
                        endif;
                        break;

                    case 'one':
                        if (!preg_match($regex['one'], $data[$field])) :
                            $isValidate = 0;
                            $message[$field]['one'] = "$customFields[$field] không hợp lệ";
                        endif;
                        break;
                }
            endforeach;
        endforeach;
        $message['isValidate'] = $isValidate;
        return $message;
    }
}
