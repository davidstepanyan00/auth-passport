<?php

namespace App\Containers\AppSection\Auth\Tasks;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Containers\AppSection\Auth\Models\User;
use App\Ship\Parents\Tasks\Task as ParentTask;

class GetUserDataForAmplitudeTask extends ParentTask
{
    public function __construct(protected UserRepositoryInterface $userRepository)
    {
    }

    public function run(string $userId): User
    {
        return $this->userRepository
            ->byId($userId)
            ->with(['team.team', 'team.roles', 'team.team.owner'])
            ->firstOrFail();
    }
}
