<?php

use App\Ship\Parents\Support\Facades\Route;
use App\Containers\AppSection\Auth\UI\API\Controllers\PasswordController;

Route::post('changeTempPassword', [PasswordController::class, 'changeTempPassword']);
