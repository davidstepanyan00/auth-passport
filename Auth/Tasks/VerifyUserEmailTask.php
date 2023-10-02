<?php

namespace App\Containers\AppSection\Auth\Tasks;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Containers\AppSection\Auth\Exceptions\FailedVerifyUserEmailException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Carbon\Carbon;
use Throwable;

class VerifyUserEmailTask extends ParentTask
{
    public function __construct(protected UserRepositoryInterface $userRepository)
    {
    }

    /**
     * @throws FailedVerifyUserEmailException
     */
    public function run(string $userId): void
    {
        try {
          $this->userRepository->update(['email_verified_at' => Carbon::now()], $userId);
        } catch (Throwable) {
            throw new FailedVerifyUserEmailException();
        }
    }
}
