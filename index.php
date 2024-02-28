<?php
require_once './vendor/autoload.php';
require_once './core/Route/config.php';

use Core\Route\Route;
// use App\Http\Controllers\AppController;
use App\Http\Controllers\HomeController;

$route = new Route();
// $controller = $route->getController();
// $test = "App\\Http\\Controllers\\" . $controller;
// $ob = new $test;

// $app = new AppController();
// $db = new Database();
// $temp = $db->query("SELECT * FROM users", [], true);
// $data = [
//     "address" => "Ha Noi",
//     "email" => "20nguyenhaukx@gmail.com"
// ];
// $db->insert("users", $data);
// var_dump($db->insert("SELECT * FROM users", $data));
// var_dump($db->update("SELECT * FROM users WHERE id = 3"));
// $db->delete("users", ["id"=>3]);
// if (!empty($_SERVER['PATH_INFO'])):
//     $pathInfo = $_SERVER['PATH_INFO'];
// else:
//     $pathInfo = '/';
// endif;

// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';

