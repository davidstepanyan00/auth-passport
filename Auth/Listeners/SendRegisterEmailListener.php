<?php

namespace App\Containers\AppSection\Auth\Listeners;

use App\Containers\AppSection\Auth\Events\RegisterEvent;
use App\Containers\AppSection\Auth\Jobs\SendRegisterEmailJob;
use App\Ship\Parents\Listeners\Listener as ParentListener;

class SendRegisterEmailListener extends ParentListener
{
    public function handle(RegisterEvent $event): void
    {
        SendRegisterEmailJob::dispatch($event->dto->userId);
    }
}
