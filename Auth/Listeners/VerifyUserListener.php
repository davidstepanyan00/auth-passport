<?php

namespace App\Containers\AppSection\Auth\Listeners;

use App\Containers\AppSection\Auth\Events\LoginEvent;
use App\Containers\AppSection\Auth\Jobs\VerifyUserJob;
use App\Ship\Parents\Listeners\Listener as ParentListener;

class VerifyUserListener extends ParentListener
{
    public function handle(LoginEvent $event): void
    {
        VerifyUserJob::dispatch($event->userId);
    }
}
