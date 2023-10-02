<?php

namespace App\Containers\AppSection\Auth\Actions;

use App\Containers\AppSection\Auth\Exceptions\FailedVerifyUserEmailException;
use App\Containers\AppSection\Auth\Tasks\GetUserByIdTask;
use App\Containers\AppSection\Auth\Tasks\VerifyUserEmailTask;
use App\Containers\AppSection\Cryption\Task\DeCryptTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use Throwable;

class VerifyEmailAction extends ParentAction
{
    public function __construct(
        protected VerifyUserEmailTask $verifyUserEmailTask,
        protected DeCryptTask $deCryptTask,
        protected GetUserByIdTask $getUserByIdTask,
    ) {
    }

    /**
     * @throws FailedVerifyUserEmailException
     */
    public function run(string $hash): void
    {
        $data = $this->deCryptTask->run($hash);
        $data = json_decode($data);

        try {
            $user = $this->getUserByIdTask->run($data->userId);
            $this->verifyUserEmailTask->run($user->id);
        } catch (Throwable $e) {
            throw new FailedVerifyUserEmailException();
        }
    }
}
