<?php

use Core\Build\Route;
use Modules\User\Controller\UserController;

Route::prefix('thanh-vien', function () {
    Route::get('danh-sach', [UserController::class, 'index']);
});
