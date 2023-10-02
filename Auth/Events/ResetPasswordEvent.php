<?php

namespace App\Containers\AppSection\Auth\Events;

use App\Containers\AppSection\Auth\Dto\ResetPasswordDto;
use App\Ship\Parents\Events\Event as ParentEvent;

class ResetPasswordEvent extends ParentEvent
{
    public function __construct(public ResetPasswordDto $dto)
    {
    }
}
