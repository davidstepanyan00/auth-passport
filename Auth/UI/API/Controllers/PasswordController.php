<?php

namespace App\Containers\AppSection\Auth\UI\API\Controllers;

use App\Containers\AppSection\Auth\Actions\ChangeTempPasswordAction;
use App\Containers\AppSection\Auth\Actions\ForgetPasswordAction;
use App\Containers\AppSection\Auth\Actions\ResetPasswordAction;
use App\Containers\AppSection\Auth\Dto\ChangeTempPasswordDto;
use App\Containers\AppSection\Auth\Dto\ResetPasswordDto;
use App\Containers\AppSection\Auth\Exceptions\FailedChangeTempPasswordException;
use App\Containers\AppSection\Auth\Exceptions\FailedResetUserPasswordException;
use App\Containers\AppSection\Auth\UI\API\Requests\ChangeTempPasswordRequest;
use App\Containers\AppSection\Auth\UI\API\Requests\ForgetPasswordRequest;
use App\Containers\AppSection\Auth\UI\API\Requests\ResetPasswordRequest;
use App\Ship\Parents\Controllers\ApiController as ParentApiController;
use Illuminate\Http\JsonResponse;

class PasswordController extends ParentApiController
{
    public function forget(
        ForgetPasswordRequest $request,
        ForgetPasswordAction $action,
    ): JsonResponse {
        $action->run($request->getUsername());

        return $this->responseSuccess();
    }

    /**
     * @throws FailedResetUserPasswordException
     */
    public function reset(
        ResetPasswordRequest $request,
        ResetPasswordAction $action,
    ): JsonResponse {
        $dto = ResetPasswordDto::fromRequest($request);

        $action->run($dto);

        return $this->responseSuccess();
    }

    /**
     * @throws FailedChangeTempPasswordException
     */
    public function changeTempPassword(
        ChangeTempPasswordRequest $request,
        ChangeTempPasswordAction $action,
    ): JsonResponse {
        $dto = ChangeTempPasswordDto::fromRequest($request);

        $action->run($dto);

        return $this->responseSuccess();
    }
}
