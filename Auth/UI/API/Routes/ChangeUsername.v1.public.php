<?php

use App\Containers\AppSection\Auth\UI\API\Controllers\UserController;
use App\Ship\Parents\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::post('changeEmail', [UserController::class, 'changeEmail']);
});

