<?php

namespace App\Containers\AppSection\Auth\Data\Repositories\Interfaces;

use App\Ship\Parents\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function select(array $columns): self;

    public function byRunningUsersIds(array $runningUsersIds): self;

    public function byUsername(string $username): self;

    public function withTeam(): self;

    public function byIds(array $ids): self;

    public function byTeamId(string $teamId): self;

    public function byId(string $id): self;

    public function byTestUser(): self;

    public function byPassword(string $password): self;
}
