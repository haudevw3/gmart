<?php

namespace App\Http\Requests;

use App\Facades\Validator;

class Request
{
    protected $messages;

    public function __construct()
    {
    }

    public function getRequestInfo()
    {
        return [
            'method' => $this->isMethod('get') ? 'get' : 'post',
            'path_info' => trimBothEndsIfMatch($_SERVER['PATH_INFO'] ?? null, '/') ?? null,
            'uri' => trimBothEndsIfMatch($_SERVER['REQUEST_URI'], '/') ?? null,
            'url' => $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?? null,
            'query_string' => $_SERVER['QUERY_STRING'] ?? null,
            'params' => $this->all()
        ];
    }

    public function isMethod($method)
    {
        $requestMethod = strtolower($_SERVER['REQUEST_METHOD']);
        if ($requestMethod == $method) :
            return true;
        endif;
        return false;
    }

    private function filterInput($method, $type, $filter = FILTER_SANITIZE_SPECIAL_CHARS, $options = 0)
    {
        $data = [];
        if (!empty($method)) :
            foreach ($method as $key => $value) :
                $data[$key] = filter_input($type, $key, $filter, $options);
            endforeach;
        endif;
        return $data;
    }

    public function all()
    {
        if ($this->isMethod('get')) :
            $data = $this->filterInput($_GET, INPUT_GET);
        else :
            $data = $this->filterInput($_POST, INPUT_POST);
        endif;
        return $data;
    }

    public function input($name)
    {
        if ($this->isMethod('get')) :
            $data = $this->filterInput($_GET, INPUT_GET);
        else :
            $data = $this->filterInput($_POST, INPUT_POST);
        endif;
        return $data[$name];
    }

    public function validate($rules = [], $customFields = [])
    {
        if (!empty($rules)) :
            foreach ($rules as $field => $rule) :
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
            $validator = Validator::make($data, $ruleArray, $customFields);
            $this->messages = $validator;
            return $validator;
        endif;
    }

    public function errors()
    {
        foreach ($this->messages as $field => $message) :
            if (is_array($message)) :
                $errors[$field] = reset($message);
            endif;
        endforeach;
        return $errors;
    }
}
