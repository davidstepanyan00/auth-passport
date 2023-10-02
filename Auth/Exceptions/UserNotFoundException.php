<?php

namespace App\Containers\AppSection\Auth\Exceptions;

use App\Ship\Exceptions\BusinessLogicException;
use App\Ship\Parents\Exceptions\Exception as ParentException;

class UserNotFoundException extends ParentException
{
    public function getStatus(): int
    {
        return BusinessLogicException::USER_NOT_FOUND;
    }

    public function getStatusMessage(): string
    {
        return __('appSection@auth::errors.user_not_found');
    }
}
