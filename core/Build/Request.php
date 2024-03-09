<?php

namespace Core\Build;

class Request
{

    public function __construct()
    {
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
}
