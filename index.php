<?php
require_once './vendor/autoload.php';
require_once './core/Config/routes.php';
require_once './core/Config/database.php';

use Core\Build\DB;
use Core\Build\Route;

var_dump(DB::table('users')->where('username', '=', 'nguyenhau')->get());


// $route = new Route();
// $database = new Database();
// $database1 = new Database();
// var_dump($database);
// var_dump($database1);
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

