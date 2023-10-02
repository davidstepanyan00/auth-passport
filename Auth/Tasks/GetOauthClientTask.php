<?php

namespace App\Containers\AppSection\Auth\Tasks;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\OauthClientRepositoryInterface;
use App\Containers\AppSection\Auth\Models\OauthClient;
use App\Ship\Parents\Tasks\Task as ParentTask;

class GetOauthClientTask extends ParentTask
{
    public function __construct(protected OauthClientRepositoryInterface $oauthClientRepository)
    {
    }

    public function run(): OauthClient
    {
        return $this->oauthClientRepository
            ->byId(config('passport.personal_access_client.id'))
            ->firstOrFail();
    }
}
