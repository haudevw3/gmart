<?php

namespace App\Facades;

use App\Singletons\Singleton;

class Response extends Singleton
{
    public static function redirect($uri = '')
    {
        global $regex;
        if (preg_match($regex['httpHttpsRegex'], $uri)) :
            $url = $uri;
        else :
            $url = 'http://localhost:8080/gmart/' . $uri;
        endif;
        header('location: ' . $url);
        die();
    }
}
