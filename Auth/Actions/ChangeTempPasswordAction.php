<?php

namespace App\Containers\AppSection\Auth\Actions;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Containers\AppSection\Auth\Dto\ChangeTempPasswordDto;
use App\Containers\AppSection\Auth\Exceptions\FailedChangeTempPasswordException;
use App\Containers\AppSection\Auth\Jobs\DeleteUserResetPasswordCodeJob;
use App\Containers\AppSection\Auth\Models\User;
use App\Ship\Parents\Actions\Action as ParentAction;
use Throwable;

class ChangeTempPasswordAction extends ParentAction
{
    public function __construct(
        protected UserRepositoryInterface $userRepository,
    ) {
    }

    /**
     * @throws FailedChangeTempPasswordException
     */
    public function run(ChangeTempPasswordDto $dto): void
    {
        try {
            $this->userRepository
                ->byUsername($dto->username)
                ->updateByConditions(User::updatePassword($dto->password));

            DeleteUserResetPasswordCodeJob::dispatch($dto->username);
        } catch (Throwable $e) {
            throw new FailedChangeTempPasswordException();
        }
    }
}
