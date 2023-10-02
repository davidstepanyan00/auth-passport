<?php

use App\Containers\AppSection\Auth\UI\API\Controllers\AuthController;
use App\Ship\Parents\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
});
