<?php

namespace App\Containers\AppSection\Auth\Tasks;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Containers\AppSection\Auth\Exceptions\FailedUpdateUserPasswordException;
use App\Containers\AppSection\Auth\Models\User;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Throwable;

class UpdateUserPasswordTask extends ParentTask
{
    public function __construct(protected UserRepositoryInterface $userRepository)
    {
    }

    /**
     * @throws FailedUpdateUserPasswordException
     */
    public function run(string $password, string $userId): void
    {
        try {
            $this->userRepository->update(User::updatePassword($password), $userId);
        } catch (Throwable $e) {
            throw new FailedUpdateUserPasswordException();
        }
    }
}
