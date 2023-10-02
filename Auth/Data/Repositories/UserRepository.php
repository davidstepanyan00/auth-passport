<?php

namespace App\Containers\AppSection\Auth\Data\Repositories;

use App\Containers\AppSection\Auth\Data\Repositories\Criterias\ByTeamId;
use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Containers\AppSection\Auth\Models\User;
use App\Ship\Core\Abstracts\Repositories\Exceptions\RepositoryException;
use App\Ship\Parents\Repositories\Criteria\ByFieldValue;
use App\Ship\Parents\Repositories\Criteria\ById;
use App\Ship\Parents\Repositories\Criteria\ByIds;
use App\Ship\Parents\Repositories\Criteria\FindByCondition;
use App\Ship\Parents\Repositories\Criteria\Select;
use App\Ship\Parents\Repositories\Criteria\With;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

class UserRepository extends ParentRepository implements UserRepositoryInterface
{
    public function model(): string
    {
        return User::class;
    }

    /**
     * @throws RepositoryException
     */
    public function select(array $columns): self
    {
        return $this->pushCriteria(new Select($columns));
    }

    /**
     * @throws RepositoryException
     */
    public function byRunningUsersIds(array $runningUsersIds): self
    {
        return $this->pushCriteria(new ByIds($runningUsersIds));
    }

    /**
     * @throws RepositoryException
     */
    public function byUsername(string $username): self
    {
        return $this->pushCriteria(new FindByCondition('username', $username));
    }

    /**
     * @throws RepositoryException
     */
    public function withTeam(): self
    {
        return $this->pushCriteria(new With(['team']));
    }

    /**
     * @throws RepositoryException
     */
    public function byIds(array $ids): self
    {
        return $this->pushCriteria(new ByIds($ids));
    }

    /**
     * @throws RepositoryException
     */
    public function byTeamId(string $teamId): self
    {
        return $this->pushCriteria(new ByTeamId($teamId));
    }

    /**
     * @throws RepositoryException
     */
    public function byId(string $id): self
    {
        return $this->pushCriteria(new ById($id));
    }

    /**
     * @throws RepositoryException
     */
    public function byTestUser(): self
    {
        return $this->pushCriteria(new ByFieldValue(true,'test'));
    }

    /**
     * @throws RepositoryException
     */
    public function byPassword(string $password): self
    {
        return $this->pushCriteria(new ByFieldValue($password, 'password'));
    }
}
