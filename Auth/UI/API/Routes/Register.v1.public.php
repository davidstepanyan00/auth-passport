<?php

use App\Containers\AppSection\Auth\UI\API\Controllers\AuthController;
use App\Ship\Parents\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
