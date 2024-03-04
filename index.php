<?php
require_once './vendor/autoload.php';

use App\Http\Controller\HomeController;
use App\Http\Controller\ProductController;
use Core\Build\Route;

// $data = [
//     'name' => 'Tủ lạnh 2',
//     'slug' => 'ti-vi',
//     'image' => 'test',
//     'parent_id' => 0
// ];

// DB::table('categories')->where('name', '=', 'Tủ lạnh')->delete();
// echo '<br>';

// echo '<pre>';
// print_r(DB::table('categories')->get());
// echo '</pre>';

// Route::get('homepage', [controller, method])
// Route::get('trang-chu', [HomeController::class, 'index']);
// Route::get('san-pham', [ProductController::class, 'index']);
// Route::get('san-pham1', [ProductController::class, 'index']);
// var_dump(Route::get('homepage'));
// var_dump(Route::get('homespage'));

// $a = [
//     'name' => 'sadas'
// ];

Route::prefix('san-pham', function () {
    Route::get('/danh-sach', [ProductController::class, 'index']);
    Route::get('/them-san-pham', [ProductController::class, 'add']);
});
