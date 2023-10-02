<?php

namespace App\Containers\AppSection\Auth\Actions;

use App\Containers\AppSection\Auth\Dto\CreateUserDto;
use App\Containers\AppSection\Auth\Exceptions\FailedRegisterUserException;
use App\Containers\AppSection\Auth\Tasks\CreateUserTask;
use App\Containers\AppSection\Auth\UI\API\Transformers\UserResource;
use App\Ship\Parents\Actions\Action as ParentAction;
use Throwable;

class CreateUserAction extends ParentAction
{
    public function __construct(private readonly CreateUserTask $createUserTask)
    {
    }

    /**
     * @throws FailedRegisterUserException
     */
    public function run(CreateUserDto $dto): UserResource
    {
        try {
          $user = $this->createUserTask->run($dto);

          return new UserResource($user);
        } catch (Throwable $e) {
            throw new FailedRegisterUserException();
        }
    }
}
