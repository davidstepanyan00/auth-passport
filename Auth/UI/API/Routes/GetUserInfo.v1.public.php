<?php

use App\Containers\AppSection\Auth\UI\API\Controllers\UserController;
use App\Ship\Parents\Support\Facades\Route;

Route::prefix('user')->group(function () {
    Route::get('/info', [UserController::class, 'getUserInfo']);
});

