<?php

namespace App\Containers\AppSection\Auth\Jobs;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Containers\AppSection\Team\Events\AcceptTeamInviteEvent;
use App\Ship\Parents\Jobs\Job as ParentJob;
use Carbon\Carbon;

class VerifyUserJob extends ParentJob
{
    public function __construct(protected string $userId)
    {
    }

    public function handle(UserRepositoryInterface $userRepository): void
    {
        $user = $userRepository
            ->byId($this->userId)
            ->firstOrFail();

        if (!$user->email_verified_at) {
            $userRepository->update(['email_verified_at' => Carbon::now()], $user->id);
            AcceptTeamInviteEvent::dispatch();
        }
    }
}
