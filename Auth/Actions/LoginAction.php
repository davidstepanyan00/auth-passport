<?php

namespace App\Containers\AppSection\Auth\Actions;

use App\Containers\AppSection\Analytics\Tasks\GetUserPropertiesTask;
use App\Containers\AppSection\Auth\Dto\LoginDto;
use App\Containers\AppSection\Auth\Events\LoginEvent;
use App\Containers\AppSection\Auth\Tasks\GetOauthClientTask;
use App\Containers\AppSection\Auth\Tasks\GetUserByUsernameTask;
use App\Containers\AppSection\Auth\UI\API\Transformers\CredentialResource;
use App\Ship\Classes\PasswordGenerator;
use App\Ship\Exceptions\PassportAuthenticationException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Support\Facades\Http;
use App\Ship\Parents\Support\Str;

class LoginAction extends ParentAction
{
    public function __construct(
        protected GetUserByUsernameTask $getUserByUsernameTask,
        protected GetOauthClientTask $getOauthClientTask,
    ) {
    }


    /**
     * @throws PassportAuthenticationException
     */
    public function run(LoginDto $dto): CredentialResource
    {
        $user = $this->getUserByUsernameTask->run($dto->getUsername());

        $oauthClient = $this->getOauthClientTask->run();

        $response = Http::asForm()->post(env('APP_PASSPORT_URL') . '/oauth/token', [
            'grant_type' => 'password',
            'client_id' => $oauthClient->id,
            'client_secret' => $oauthClient->secret,
            'username' => $dto->getUsername(),
            'password' => $dto->getPassword(),
            'scope' => '*',
        ]);


        $data = json_decode($response->getBody()->getContents());

        if (!isset($data) || property_exists($data, 'errors')) {
            throw new PassportAuthenticationException();
        }

        LoginEvent::dispatch($user->id, $data->access_token, $dto->amplitude);

        $userProperties = (new GetUserPropertiesTask($user))->run();
        $user['properties'] = $userProperties;

        $data->user = $user;

        return new CredentialResource($data);
    }
}
