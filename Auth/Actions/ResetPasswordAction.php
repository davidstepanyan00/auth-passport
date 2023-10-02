<?php

namespace App\Containers\AppSection\Auth\Actions;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Containers\AppSection\Auth\Dto\ResetPasswordDto;
use App\Containers\AppSection\Auth\Events\ResetPasswordEvent;
use App\Containers\AppSection\Auth\Exceptions\FailedResetUserPasswordException;
use App\Containers\AppSection\Auth\Jobs\DeleteUserResetPasswordCodeJob;
use App\Containers\AppSection\Auth\Models\User;
use App\Ship\Parents\Actions\Action as ParentAction;
use Throwable;

class ResetPasswordAction extends ParentAction
{
    public function __construct(
        protected UserRepositoryInterface $userRepository,
    ) {
    }

    /**
     * @throws FailedResetUserPasswordException
     */
    public function run(ResetPasswordDto $dto): void
    {
        try {
            $this->userRepository
                ->byUsername($dto->username)
                ->updateByConditions(User::updatePassword($dto->password));

            ResetPasswordEvent::dispatch($dto);

            DeleteUserResetPasswordCodeJob::dispatch($dto->username);
        } catch (Throwable $e) {
            throw new FailedResetUserPasswordException();
        }
    }
}
