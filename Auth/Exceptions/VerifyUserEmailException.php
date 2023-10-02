<?php

namespace App\Containers\AppSection\Auth\Exceptions;

use App\Ship\Exceptions\BusinessLogicException;

class VerifyUserEmailException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return self::USER_NOT_VERIFIED;
    }

    public function getStatusMessage(): string
    {
        return __('appSection@auth::errors.verify_user_email');
    }
}
