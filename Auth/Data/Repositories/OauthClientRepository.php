<?php

namespace App\Containers\AppSection\Auth\Data\Repositories;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\OauthClientRepositoryInterface;
use App\Containers\AppSection\Auth\Models\OauthClient;
use App\Ship\Core\Abstracts\Repositories\Exceptions\RepositoryException;
use App\Ship\Parents\Repositories\Criteria\ById;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

class OauthClientRepository extends ParentRepository implements OauthClientRepositoryInterface
{
    public function model(): string
    {
        return OauthClient::class;
    }

    /**
     * @throws RepositoryException
     */
    public function byId(int $id): self
    {
        return $this->pushCriteria(new ById($id));
    }
}
