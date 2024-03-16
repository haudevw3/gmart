<?php

namespace App\Facades;

class Session
{
    public function __construct()
    {
    }
    
    public static function start()
    {
        $lifeTime = 3600;
        $path = '/';
        $domain = 'http://localhost:8080/gmart/';
        $secure = false;
        $httpOnly = false;
        session_set_cookie_params([
            'lifetime' => $lifeTime,
            'path' => $path,
            'domain' => $domain,
            'secure' => $secure,
            'httponly' => $httpOnly
        ]);
        session_start();
    }

    public static function set($key, $data = [])
    {
        $_SESSION[$key] = $data;
    }

    public static function get($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public static function delete($key)
    {
        if (!empty($key) && isset($_SESSION[$key])) :
            unset($_SESSION[$key]);
        endif;
    }

    public static function destroy()
    {
        session_destroy();
    }
}
