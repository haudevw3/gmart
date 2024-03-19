<?php

use App\Facades\Route;
use Modules\User\Controller\UserController;

Route::prefix('thanh-vien')->middleware('dang-nhap')->group(function () {
    Route::get('danh-sach', [UserController::class, 'index'])->name('user-index');
    Route::get('them', [UserController::class, 'add'])->name('user-add');
});