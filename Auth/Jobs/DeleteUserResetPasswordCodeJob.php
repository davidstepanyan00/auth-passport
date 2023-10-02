<?php

namespace App\Containers\AppSection\Auth\Jobs;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserResetPasswordCodeRepositoryInterface;
use App\Containers\AppSection\Auth\Exceptions\FailedDeleteUserResetPasswordCodeException;
use App\Ship\Parents\Jobs\Job as ParentJob;
use Throwable;

class DeleteUserResetPasswordCodeJob extends ParentJob
{
    public function __construct(protected string $username)
    {
    }

    /**
     * @throws FailedDeleteUserResetPasswordCodeException
     */
    public function handle(
        UserResetPasswordCodeRepositoryInterface $userResetPasswordCodeRepository
    ): void {
        try {
            $userResetPasswordCodeRepository
                ->byUsername($this->username)
                ->deleteByCriteria();
        } catch (Throwable $e) {
            throw new FailedDeleteUserResetPasswordCodeException($e->getMessage());
        }
    }
}
