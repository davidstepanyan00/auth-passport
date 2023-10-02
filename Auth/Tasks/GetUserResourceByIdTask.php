<?php

namespace App\Containers\AppSection\Auth\Tasks;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Containers\AppSection\Auth\UI\API\Transformers\UserResource;
use App\Ship\Parents\Tasks\Task as ParentTask;

class GetUserResourceByIdTask extends ParentTask
{
    public function __construct(protected UserRepositoryInterface $userRepository)
    {
    }

    public function run(string $userId): UserResource
    {
        $user = $this->userRepository->byId($userId)->firstOrFail();

        return new UserResource($user);
    }
}