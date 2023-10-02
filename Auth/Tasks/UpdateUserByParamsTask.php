<?php

namespace App\Containers\AppSection\Auth\Tasks;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Ship\Parents\Tasks\Task as ParentTask;

class UpdateUserByParamsTask extends ParentTask
{
    public function __construct(protected UserRepositoryInterface $userRepository)
    {
    }

    public function run(array $params, string $userId)
    {
        return $this->userRepository->update($params, $userId);
    }
}
