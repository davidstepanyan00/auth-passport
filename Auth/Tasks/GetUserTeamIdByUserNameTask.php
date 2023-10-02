<?php

namespace App\Containers\AppSection\Auth\Tasks;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Containers\AppSection\Auth\Models\User;
use App\Ship\Parents\Tasks\Task as ParentTask;

class GetUserTeamIdByUserNameTask extends ParentTask
{
    public function __construct(protected UserRepositoryInterface $userRepository)
    {
    }

    public function run(string $username): string
    {
        /**
         * @var User $user
         */
        $user = $this->userRepository
            ->withTeam()
            ->byUsername($username)
            ->first();

        return $user->teamId();
    }
}
