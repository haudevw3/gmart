<?php

namespace App\Facades;

class View
{
    protected static $viewPath;

    public function __construct()
    {
    }

    public static function make($view, $data = [])
    {
        $file = self::$viewPath . "/$view.php";
        if (file_exists($file)) :
            extract($data);
            require_once $file;
        else :
            echo "Không tìm thấy file: $view.php";
        endif;
    }

    public static function setViewPath($viewPath)
    {
        self::$viewPath = $viewPath;
    }
}
