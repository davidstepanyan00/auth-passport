<?php

namespace App\Containers\AppSection\Auth\Jobs;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Containers\AppSection\Auth\Dto\SendConfirmationEmailDto;
use App\Containers\AppSection\Auth\Exceptions\FailedSendConfirmationEmailLinkException;
use App\Containers\AppSection\Auth\Notifications\RegisterEmailNotification;
use App\Ship\Parents\Jobs\Job as ParentJob;
use Throwable;

class SendRegisterEmailJob extends ParentJob
{
    public function __construct(protected string $userId)
    {
    }

    /**
     * @throws FailedSendConfirmationEmailLinkException
     */
    public function handle(UserRepositoryInterface $userRepository): void
    {
        try {
            $user = $userRepository->byId($this->userId)->firstOrFail();

            $dto = SendConfirmationEmailDto::from(['url' => env('APP_FRONT_URL')]);

            $user->notify(new RegisterEmailNotification($dto));
        } catch (Throwable $e) {
            throw new FailedSendConfirmationEmailLinkException($e->getMessage());
        }
    }
}
