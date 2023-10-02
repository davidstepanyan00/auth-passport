<?php

namespace App\Containers\AppSection\Auth\Data\Repositories\Interfaces;

use App\Ship\Parents\Repositories\RepositoryInterface;

interface RoleRepositoryInterface extends RepositoryInterface
{
    public function byName(string $name): self;
}
