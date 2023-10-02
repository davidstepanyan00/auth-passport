<?php

namespace App\Containers\AppSection\Auth\Tasks;

use App\Containers\AppSection\Auth\Dto\CreateUserDto;
use App\Ship\Parents\Tasks\Task as ParenTask;

class CreateUserDtoTask extends ParenTask
{
    public function run(
        string $username,
        ?string $password,
        bool $confirmationEmail,
        bool $test = false,
        array $additionalData = [],
    ): CreateUserDto {
        return CreateUserDto::fromParams($username, $password, $confirmationEmail, $test, $additionalData);
    }
}
