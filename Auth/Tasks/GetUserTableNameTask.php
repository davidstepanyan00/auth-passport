<?php

namespace App\Containers\AppSection\Auth\Tasks;

use App\Containers\AppSection\Auth\Models\User;
use App\Ship\Parents\Tasks\Task as ParentTask;

class GetUserTableNameTask extends ParentTask
{
    public static function run(): string
    {
        return User::getTableName();
    }
}