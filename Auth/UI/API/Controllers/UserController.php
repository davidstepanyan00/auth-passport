<?php

namespace App\Containers\AppSection\Auth\UI\API\Controllers;

use App\Containers\AppSection\Auth\Actions\ChangeUsernameAction;
use App\Containers\AppSection\Auth\Actions\GetUserInfoAction;
use App\Containers\AppSection\Auth\Actions\VerifyEmailAction;
use App\Containers\AppSection\Auth\Dto\ChangeUsernameDto;
use App\Containers\AppSection\Auth\Exceptions\FailedVerifyUserEmailException;
use App\Containers\AppSection\Auth\Exceptions\IncorrectPasswordException;
use App\Containers\AppSection\Auth\Exceptions\UpdateUsernameErrorException;
use App\Containers\AppSection\Auth\UI\API\Requests\ChangeUsernameRequest;
use App\Containers\AppSection\Auth\UI\API\Requests\GetUserInfoRequest;
use App\Containers\AppSection\Auth\UI\API\Requests\VerifyEmailRequest;
use App\Containers\AppSection\Auth\UI\API\Transformers\GetUserInfoResource;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class UserController extends ApiController
{
    /**
     * @throws UpdateUsernameErrorException
     * @throws IncorrectPasswordException
     */
    public function changeEmail(
        ChangeUsernameRequest $request,
        ChangeUsernameAction $changeUsernameAction
    ): JsonResponse {
        $dto = ChangeUsernameDto::fromRequest($request);

        $changeUsernameAction->run($dto);

        return $this->responseSuccess();
    }

    /**
     * @throws FailedVerifyUserEmailException
     */
    public function verifyEmail(
       VerifyEmailRequest $request,
       VerifyEmailAction $verifyEmailAction,
    ): RedirectResponse {
        $verifyEmailAction->run($request->getHash());

        return redirect(env('APP_FRONT_URL'));
    }

    public function getUserInfo(
        GetUserInfoRequest $getUserInfoRequest,
        GetUserInfoAction $getUserInfoAction,
    ): GetUserInfoResource {
        return $getUserInfoAction->run($getUserInfoRequest->getUserId());
    }
}
