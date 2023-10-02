<?php

namespace App\Containers\AppSection\Auth\Tasks;

use App\Containers\AppSection\Auth\Dto\UpdateUserDto;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateUpdateUserDtoTask extends ParentTask
{
    public function run(string $displayName, string $teamMemberId): UpdateUserDto
    {
        return UpdateUserDto::fromParams($displayName, $teamMemberId);
    }
}
