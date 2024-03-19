<?php

namespace App\Facades;

class Validator
{
    public function __construct()
    {
    }

    public static function make($data = [], $rules = [], $messages = [])
    {
        global $regex;
        $_messages = [];
        $isValidated = 1;
        foreach ($rules as $field => $ruleItem) :
            foreach ($ruleItem as $key => $value) :
                switch ($key) {
                    case 'required':
                        if (strlen($data[$field]) == 0) :
                            $isValidated = 0;
                            $_messages[$field][$key] = $messages["$field.$key"];
                        endif;
                        break;

                    case 'min':
                        if (strlen($data[$field]) > 0 && strlen($data[$field]) < $value) :
                            $isValidated = 0;
                            $_messages[$field][$key] = $messages["$field.$key"];
                        endif;
                        break;

                    case 'max':
                        if (strlen($data[$field]) > $value) :
                            $isValidated = 0;
                            $_messages[$field][$key] = $messages["$field.$key"];
                        endif;
                        break;

                    case 'alpha':
                        if (!preg_match($regex['alpha'], $data[$field])) :
                            $isValidated = 0;
                            $_messages[$field][$key] = $messages["$field.$key"];
                        endif;
                        break;
                }
            endforeach;
        endforeach;
        $_messages['isValidated'] = $isValidated;
        return $_messages;
    }
}
