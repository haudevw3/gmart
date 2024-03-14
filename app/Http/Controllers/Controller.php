<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected $module;

    public function __construct()
    {
        $this->module = $this->setModule();
    }

    abstract protected function setModule();

    public function view($view, $data = [])
    {
        $file = "./modules/$this->module/View/$view.php";
        if (file_exists($file)) :
            extract($data);
            require_once $file;
        else :
            echo "Không tìm thấy file: $view.php";
        endif;
    }
}