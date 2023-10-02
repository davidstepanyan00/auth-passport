<?php

namespace App\Containers\AppSection\Auth\Jobs;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserResetPasswordCodeRepositoryInterface;
use App\Containers\AppSection\Auth\Dto\SendResetPasswordDto;
use App\Containers\AppSection\Auth\Exceptions\FailedSendForgetPasswordLinkException;
use App\Containers\AppSection\Auth\Models\UserResetPasswordCode;
use App\Containers\AppSection\Auth\Notifications\ResetPasswordNotification;
use App\Containers\AppSection\Auth\Tasks\GenerateUserTempCodeForPasswordTask;
use App\Ship\Parents\Jobs\Job as ParentJob;
use Throwable;

class SendResetPasswordJob extends ParentJob
{
    public function __construct(protected string $username)
    {
    }

    /**
     * @throws FailedSendForgetPasswordLinkException
     */
    public function handle(
        UserRepositoryInterface $userRepository,
        UserResetPasswordCodeRepositoryInterface $userResetPasswordCodeRepository,
        GenerateUserTempCodeForPasswordTask $generateUserTempCodeForPasswordTask,
    ): void {
        try {
            $user = $userRepository
                ->byUsername($this->username)
                ->firstOrFail();

            $code = $generateUserTempCodeForPasswordTask->run();

            $userResetPasswordCodeRepository->updateOrCreate(
                ['username' => $user->username],
                UserResetPasswordCode::createModel($user->username, $code)
            );

            $url = env('APP_FRONT_RESET_PASSWORD_URL') ."?username={$user->username}";

            $dto = SendResetPasswordDto::fromParams($url, $code);

            $user->notify(new ResetPasswordNotification($dto));
        } catch (Throwable $e) {
            throw new FailedSendForgetPasswordLinkException($e->getMessage());
        }
    }
}
