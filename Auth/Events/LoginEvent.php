<?php

namespace App\Containers\AppSection\Auth\Events;

use App\Ship\Classes\Dtos\AmplitudeParamsDto;
use App\Ship\Parents\Events\Event as ParentEvent;

class LoginEvent extends ParentEvent
{
    public function __construct(
        public string  $userId,
        public string  $token,
        public AmplitudeParamsDto $amplitude,
    ) {
        //
    }
}
