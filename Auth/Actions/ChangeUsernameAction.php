<?php

namespace App\Containers\AppSection\Auth\Actions;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Containers\AppSection\Auth\Dto\ChangeUsernameDto;
use App\Containers\AppSection\Auth\Exceptions\IncorrectPasswordException;
use App\Containers\AppSection\Auth\Exceptions\UpdateUsernameErrorException;
use App\Containers\AppSection\Auth\Models\User;
use App\Containers\AppSection\Auth\Tasks\GetUserByUsernameTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Support\Facades\Hash;

class ChangeUsernameAction extends ParentAction
{
    public function __construct(
        protected GetUserByUsernameTask $getUserByUsernameTask,
        protected UserRepositoryInterface $userRepository,
    ) {
    }

    /**
     * @throws UpdateUsernameErrorException
     * @throws IncorrectPasswordException
     */
    public function run(ChangeUsernameDto $changeUsernameDto): void
    {
        $user = $this->getUserByUsernameTask->run($changeUsernameDto->username);
        $updateData = User::updateUserName($changeUsernameDto->newUsername);

        if (!Hash::check($changeUsernameDto->password, $user->password)) {
            throw new IncorrectPasswordException();
        }

        try {
            $this->userRepository->update($updateData, $user->id);
        } catch (\Throwable $e) {
            throw new UpdateUsernameErrorException();
        }
    }
}
