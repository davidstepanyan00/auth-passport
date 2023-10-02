<?php

namespace App\Containers\AppSection\Auth\Data\Repositories;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserResetPasswordCodeRepositoryInterface;
use App\Containers\AppSection\Auth\Models\UserResetPasswordCode;
use App\Ship\Core\Abstracts\Repositories\Exceptions\RepositoryException;
use App\Ship\Parents\Repositories\Criteria\ByFieldValue;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

class UserResetPasswordCodeRepository extends ParentRepository implements UserResetPasswordCodeRepositoryInterface
{
    public function model(): string
    {
        return UserResetPasswordCode::class;
    }

    /**
     * @throws RepositoryException
     */
    public function byUsername(string $username): self
    {
        return $this->pushCriteria(new ByFieldValue($username,'username'));
    }

    /**
     * @throws RepositoryException
     */
    public function byCode(string $code): self
    {
        return $this->pushCriteria(new ByFieldValue($code, 'code'));
    }
}
