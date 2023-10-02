<?php

namespace App\Containers\AppSection\Auth\Events;

use App\Containers\AppSection\Auth\Dto\CreateUserDto;
use App\Ship\Parents\Events\Event as ParentEvent;

class RegisterEvent extends ParentEvent
{
    public function __construct(public CreateUserDto $dto)
    {
    }
}
