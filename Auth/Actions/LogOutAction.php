<?php

namespace App\Containers\AppSection\Auth\Actions;

use App\Containers\AppSection\Auth\Dto\LogOutDto;
use App\Containers\AppSection\Auth\Events\LogOutEvent;
use App\Containers\AppSection\Auth\Models\User;
use App\Ship\Parents\Actions\Action as ParentAction;

class LogOutAction extends ParentAction
{
    public function run(User $user, LogOutDto $dto): array
    {
        $token = $user->token();
        $token->revoke();

        LogOutEvent::dispatch($dto);

        return ["message" => __('appSection@auth::messages.user_successfully_signed_out')];
    }
}
