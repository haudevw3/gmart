<?php

namespace App\Facades;

class Response
{
    public function __construct()
    {
    }

    public static function redirect($uri = '')
    {
        if (preg_match('~^(http|https)~is', $uri)) :
            $url = $uri;
        else :
            $url = 'http://localhost:8080/gmart/' . $uri;
        endif;
        header('location: ' . $url);
        die();
    }
}
