<?php

namespace App\Containers\AppSection\Auth\UI\API\Controllers;

use App\Containers\AppSection\Auth\Actions\CreateUserAction;
use App\Containers\AppSection\Auth\Actions\LoginAction;
use App\Containers\AppSection\Auth\Actions\LogOutAction;
use App\Containers\AppSection\Auth\Actions\RefreshTokenAction;
use App\Containers\AppSection\Auth\Dto\CreateUserDto;
use App\Containers\AppSection\Auth\Dto\LoginDto;
use App\Containers\AppSection\Auth\Dto\LogOutDto;
use App\Containers\AppSection\Auth\Dto\RefreshTokenDto;
use App\Containers\AppSection\Auth\Exceptions\FailedRegisterUserException;
use App\Containers\AppSection\Auth\UI\API\Requests\LoginRequest;
use App\Containers\AppSection\Auth\UI\API\Requests\LogOutRequest;
use App\Containers\AppSection\Auth\UI\API\Requests\RefreshTokenRequest;
use App\Containers\AppSection\Auth\UI\API\Requests\RegisterRequest;
use App\Containers\AppSection\Auth\UI\API\Transformers\CredentialResource;
use App\Containers\AppSection\Auth\UI\API\Transformers\UserResource;
use App\Ship\Exceptions\PassportAuthenticationException;
use App\Ship\Parents\Controllers\ApiController;
use App\Ship\Parents\Exceptions\AuthorizationException;
use App\Ship\Parents\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class AuthController extends ApiController
{
    /**
     * @throws PassportAuthenticationException
     */
    public function login(
        LoginRequest $request,
        LoginAction $loginAction
    ): CredentialResource {
        $dto = LoginDto::fromRequest($request);

        return $loginAction->run($dto);
    }

    /**
     * @throws FailedRegisterUserException
     */
    public function register(
        RegisterRequest $request,
        CreateUserAction $createUserAction,
    ): UserResource {
        $dto = CreateUserDto::fromRequest($request);

        return $createUserAction->run($dto);
    }

    public function logout(
        LogOutRequest $request,
        LogOutAction $logOutAction,
    ): JsonResponse {
        $dto = LogOutDto::fromRequest($request);

        $response = $logOutAction->run(Auth::user(), $dto);

        return $this->responseSuccess($response);
    }

    /**
     * @throws AuthorizationException
     */
    public function refreshToken(
        RefreshTokenRequest $request,
        RefreshTokenAction $refreshTokenAction
    ): CredentialResource {
        $dto = RefreshTokenDto::fromRequest($request);

        return $refreshTokenAction->run($dto);
    }
}
