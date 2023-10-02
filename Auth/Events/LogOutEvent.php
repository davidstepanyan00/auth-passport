<?php

namespace App\Containers\AppSection\Auth\Events;

use App\Containers\AppSection\Auth\Dto\LogOutDto;
use App\Ship\Parents\Events\Event as ParentEvent;

class LogOutEvent extends ParentEvent
{
    public function __construct(public LogOutDto $dto)
    {
    }
}
