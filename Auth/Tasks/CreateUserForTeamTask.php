<?php

namespace App\Containers\AppSection\Auth\Tasks;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Containers\AppSection\Auth\Dto\CreateUserDto;
use App\Containers\AppSection\Auth\Exceptions\FailedCreateUserException;
use App\Containers\AppSection\Auth\Models\User;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Throwable;

class CreateUserForTeamTask extends ParentTask
{
    public function __construct(protected UserRepositoryInterface $userRepository)
    {
    }

    /**
     * @throws FailedCreateUserException
     */
    public function run(CreateUserDto $dto): User
    {
        try {
           return $this->userRepository->create(User::createModel($dto));
        } catch (Throwable $e) {
            throw new FailedCreateUserException();
        }
    }
}
