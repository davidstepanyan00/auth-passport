<?php

namespace App\Containers\AppSection\Auth\Actions;

use App\Containers\AppSection\Auth\Jobs\SendResetPasswordJob;
use App\Ship\Parents\Actions\Action as ParentAction;

class ForgetPasswordAction extends ParentAction
{
    public function run(string $username): void
    {
        SendResetPasswordJob::dispatch($username);
    }
}
