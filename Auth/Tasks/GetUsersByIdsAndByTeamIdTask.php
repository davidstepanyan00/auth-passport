<?php

namespace App\Containers\AppSection\Auth\Tasks;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\Collection;

class GetUsersByIdsAndByTeamIdTask extends ParentTask
{
    public function __construct(protected UserRepositoryInterface $userRepository)
    {
    }

    public function run(array $usersIds, string $teamId): Collection
    {
        return $this->userRepository
            ->byTeamId($teamId)
            ->byIds($usersIds)
            ->get();
    }
}
