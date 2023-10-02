<?php

use App\Containers\AppSection\Auth\UI\API\Controllers\PasswordController;
use App\Ship\Parents\Support\Facades\Route;

Route::prefix('password')->group(function () {
    Route::post('/reset', [PasswordController::class, 'reset']);
});

