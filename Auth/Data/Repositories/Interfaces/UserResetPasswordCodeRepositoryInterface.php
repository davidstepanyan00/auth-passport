<?php

namespace App\Containers\AppSection\Auth\Data\Repositories\Interfaces;

use App\Ship\Parents\Repositories\RepositoryInterface;

interface UserResetPasswordCodeRepositoryInterface extends RepositoryInterface
{
    public function byUsername(string $username): self;

    public function byCode(string $code): self;
}
