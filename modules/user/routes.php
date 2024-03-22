<?php

use App\Facades\Route;
use Modules\User\Controller\UserController;

Route::get('dang-nhap', [UserController::class, 'login'])->name('login-page');
Route::get('dang-ky', [UserController::class, 'register'])->name('register-page');
Route::post('thong-tin-dang-nhap', [UserController::class, 'loginInfo'])->name('login-info');
Route::post('thong-tin-dang-ky', [UserController::class, 'registerInfo'])->name('register-info');
