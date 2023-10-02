<?php

use App\Containers\AppSection\Auth\UI\API\Controllers\AuthController;
use App\Ship\Parents\Support\Facades\Route;

Route::post('refresh-token', [AuthController::class, 'refreshToken']);
