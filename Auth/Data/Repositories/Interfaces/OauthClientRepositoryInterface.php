<?php

namespace App\Containers\AppSection\Auth\Data\Repositories\Interfaces;

use App\Ship\Parents\Repositories\RepositoryInterface;

interface OauthClientRepositoryInterface extends RepositoryInterface
{
    public function byId(int $id): self;
}
