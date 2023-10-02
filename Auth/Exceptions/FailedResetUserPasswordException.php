<?php

namespace App\Containers\AppSection\Auth\Exceptions;

use App\Ship\Exceptions\BusinessLogicException as ParentBusinessLogicException;

class FailedResetUserPasswordException extends ParentBusinessLogicException
{
    public function getStatus(): int
    {
        return self::SERVER_ERROR;
    }

    public function getStatusMessage(): string
    {
        return __('appSection@auth::errors.failed_reset_user_password');
    }
}
