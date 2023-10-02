<?php

namespace App\Containers\AppSection\Auth\Tasks;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Containers\AppSection\Auth\Models\User;
use App\Ship\Parents\Tasks\Task as ParenTask;

class GetTestUserByUsernameTask extends ParenTask
{
    public function __construct(protected UserRepositoryInterface $userRepository)
    {
    }

    public function run(string $username, array $relations = []): ?User
    {
        return $this->userRepository
            ->byUsername($username)
            ->byTestUser()
            ->with($relations)
            ->first();
    }
}
