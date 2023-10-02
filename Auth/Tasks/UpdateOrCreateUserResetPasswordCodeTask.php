<?php

namespace App\Containers\AppSection\Auth\Tasks;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserResetPasswordCodeRepositoryInterface;
use App\Containers\AppSection\Auth\Exceptions\FailedUpdateOrCreateUserResetPasswordCodeException;
use App\Containers\AppSection\Auth\Models\UserResetPasswordCode;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Throwable;

class UpdateOrCreateUserResetPasswordCodeTask extends ParentTask
{
    public function __construct(
        protected UserResetPasswordCodeRepositoryInterface $userResetPasswordCodeRepository
    ) {
    }

    /**
     * @throws FailedUpdateOrCreateUserResetPasswordCodeException
     */
    public function run(string $username, string $code): UserResetPasswordCode
    {
        try {
            return $this->userResetPasswordCodeRepository->updateOrCreate(
                ['username' => $username],
                UserResetPasswordCode::createModel($username, $code)
            );
        } catch (Throwable $e) {
            throw new FailedUpdateOrCreateUserResetPasswordCodeException($e->getMessage());
        }
    }
}
