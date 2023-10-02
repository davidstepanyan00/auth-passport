<?php

namespace App\Containers\AppSection\Auth\Actions;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Containers\AppSection\Auth\UI\API\Transformers\GetUserInfoResource;
use App\Containers\AppSection\Team\Tasks\GetUserTeamByUserIdTask;
use App\Ship\Parents\Actions\Action as ParentAction;

class GetUserInfoAction extends ParentAction
{
    public function __construct(
        protected UserRepositoryInterface $userRepository,
        protected GetUserTeamByUserIdTask $getUserTeamByUserIdTask,
    ) {
    }

    public function run(string $userId): GetUserInfoResource
    {
        $userInfo = $this->userRepository
            ->byId($userId)
            ->first();

        $userTeam = $this->getUserTeamByUserIdTask->run($userId, ['roles']);

        $userInfo->roleInTeam = $userTeam->roles->first()->name;

        return new GetUserInfoResource($userInfo);
    }
}
