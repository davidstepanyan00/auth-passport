<?php

namespace App\Containers\AppSection\Auth\Actions;

use App\Containers\AppSection\Auth\Dto\RefreshTokenDto;
use App\Containers\AppSection\Auth\Tasks\GetOauthClientTask;
use App\Containers\AppSection\Auth\Tasks\GetUserByIdTask;
use App\Containers\AppSection\Auth\UI\API\Transformers\CredentialResource;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Exceptions\AuthorizationException;
use App\Ship\Parents\Support\Facades\Http;

class RefreshTokenAction extends ParentAction
{
    public function __construct(
        protected GetUserByIdTask $getUserByIdTask,
        protected GetOauthClientTask $getOauthClientTask,
    )
    {
    }

    /**
     * @throws AuthorizationException
     */
    public function run(RefreshTokenDto $dto): CredentialResource
    {
        $oauthClient = $this->getOauthClientTask->run();

        $response =  Http::asForm()->post(config('app.url') . '/oauth/token', [
            'grant_type' => 'refresh_token',
            'client_id' => $oauthClient->id,
            'client_secret' => $oauthClient->secret,
            'refresh_token' => $dto->refreshToken,
            'scope' => '*',
        ]);

        $data = json_decode($response->getBody()->getContents());

        if (property_exists($data, 'errors')) {
            throw new AuthorizationException();
        }

        $data->user = $this->getUserByIdTask->run($dto->userId);

        return new CredentialResource($data);
    }
}
