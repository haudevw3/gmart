<?php

use App\Facades\Response;
use App\Facades\Route;
use App\Facades\Session;
use App\Facades\View;

function trimBothEndsIfMatch($str, $leftFirstChar, $rightLastChar = '')
{
    if (strlen($str) > 1) :
        $str = ltrim($str, $leftFirstChar);
        if (!empty($rightLastChar)) :
            $str = rtrim($str, $rightLastChar);
        else :
            $str = rtrim($str, $leftFirstChar);
        endif;
        return $str;
    endif;
}

function getLastElement($input, $delimiter = null)
{
    if (is_array($input) && count($input) > 0) :
        return end($input);
    elseif (is_string($input)) :
        if ($delimiter === null) :
            $array = explode(' ', $input);
        else:
            $array = explode($delimiter, $input);
        endif;
        return end($array);
    else :
        return null;
    endif;
}

function view($fileName, $data = [])
{
    $view = View::getInstance();
    $view->make($fileName, $data);
}

function route($routeName, $params = [])
{
    $route = Route::getInstance()->getRouteByName($routeName);
    $uri = '/' . $route['uri'];
    return $uri;
}

function redirectRoute($routeName, $params = [])
{
    extract($params);
    $response = Response::getInstance();
    $route = Route::getInstance()->getRouteByName($routeName);
    $pathInfo = $route['path_info'];
    $response->redirect($pathInfo);
}

function old($key)
{
    $olds = Session::get('old');
    if (!empty($olds[$key])) :
        $old = $olds[$key];
        return $old;
    endif;
}

function error($key)
{
    $errors = Session::get('errors');
    if (!empty($errors[$key])) :
        $error = $errors[$key];
        return $error;
    endif;
}
