<?php

use App\Containers\AppSection\Auth\UI\API\Controllers\UserController;
use App\Ship\Parents\Support\Facades\Route;

Route::prefix('user/')->group(function () {
    Route::get('{hash}/verify', [UserController::class, 'verifyEmail'])
        ->name('verifyEmail')
        ->where('hash', '.*');
});

