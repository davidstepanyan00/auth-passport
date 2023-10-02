<?php

namespace App\Containers\AppSection\Auth\Exceptions;

use App\Ship\Exceptions\BusinessLogicException;

class UpdateUsernameErrorException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return BusinessLogicException::SERVER_ERROR;
    }

    public function getStatusMessage(): string
    {
        return __('appSection@auth::errors.update_username_error');
    }
}
