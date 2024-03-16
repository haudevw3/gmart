<?php

use App\Facades\Route;
use Modules\User\Controller\UserController;

Route::prefix('thanh-vien', function () {
    Route::get('danh-sach', [UserController::class, 'index'])->name('user-index');
    Route::get('them', [UserController::class, 'add'])->name('user-add');
});

Route::prefix('san-pham', function () {
    Route::post('danh-sach', [UserController::class, 'index'])->name('product');
    Route::get('them', [UserController::class, 'add'])->name('product-add');
    Route::post('them', [UserController::class, 'add'])->name('product-add-s');
});