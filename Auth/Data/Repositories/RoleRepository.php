<?php

namespace App\Containers\AppSection\Auth\Data\Repositories;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\RoleRepositoryInterface;
use App\Ship\Core\Abstracts\Repositories\Exceptions\RepositoryException;
use App\Ship\Parents\Models\RoleModel;
use App\Ship\Parents\Repositories\Criteria\ByFieldValue;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

class RoleRepository extends ParentRepository implements RoleRepositoryInterface
{
    public function model(): string
    {
        return RoleModel::class;
    }

    /**
     * @throws RepositoryException
     */
    public function byName(string $name): self
    {
        return $this->pushCriteria(new ByFieldValue($name, 'name'));
    }
}
