<?php

namespace App\Containers\AppSection\Auth\Tasks;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Containers\AppSection\Auth\Dto\CreateUserDto;
use App\Containers\AppSection\Auth\Events\RegisterEvent;
use App\Containers\AppSection\Auth\Exceptions\FailedCreateUserException;
use App\Containers\AppSection\Auth\Models\User;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Throwable;

class CreateUserTask extends ParentTask
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
            $user = $this->userRepository->create(User::createModel($dto));

            $dto->userId = $user->id;

            RegisterEvent::dispatch($dto);
        } catch (Throwable $e) {
           throw new FailedCreateUserException();
        }

        return $user;
    }
}
