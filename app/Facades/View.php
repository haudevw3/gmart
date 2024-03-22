<?php

namespace App\Facades;

use App\Singletons\Singleton;

class View extends Singleton
{
    protected static $viewPath;

    public static function make($fileName, $data = [])
    {
        $file = self::$viewPath . "/desktop/$fileName.php";
        if (file_exists($file)) :
            extract($data);
            require_once $file;
        else :
            echo "Không tìm thấy file: $fileName.php";
        endif;
    }

    public static function setViewPath($viewPath)
    {
        self::$viewPath = $viewPath;
    }

    public static function getFilePath($fileName, $key = 'components')
    {
        switch ($key) {
            case 'components':
                $filePath = self::$viewPath . "/$key/$fileName.php";
                return $filePath;
                break;
        }
    }
}
