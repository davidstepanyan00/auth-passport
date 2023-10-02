<?php

namespace App\Containers\AppSection\Auth\Tasks;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\RoleRepositoryInterface;
use App\Ship\Parents\Tasks\Task as ParentTask;

class GetRoleByNameTask extends ParentTask
{
    public function __construct(protected RoleRepositoryInterface $roleRepository)
    {
    }

    public function run(string $roleName)
    {
        return $this->roleRepository
            ->byName($roleName)
            ->firstOrFail();
    }
}
