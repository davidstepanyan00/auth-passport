<?php

namespace App\Containers\AppSection\Auth\Exceptions;

use App\Ship\Exceptions\BusinessLogicException;

class IncorrectPasswordException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return BusinessLogicException::INCORRECT_PASSWORD;
    }

    public function getStatusMessage(): string
    {
        return __('appSection@auth::errors.incorrect_password_error');
    }
}
