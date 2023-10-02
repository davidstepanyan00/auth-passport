<?php

namespace App\Containers\AppSection\Auth\Exceptions;

use App\Ship\Exceptions\BusinessLogicException;

class FailedRegisterUserException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return self::SERVER_ERROR;
    }

    public function getStatusMessage(): string
    {
        return __('appSection@auth::errors.failed_register_user');
    }
}
