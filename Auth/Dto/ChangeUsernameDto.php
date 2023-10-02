<?php

namespace App\Containers\AppSection\Auth\Dto;

use App\Containers\AppSection\Auth\UI\API\Requests\ChangeUsernameRequest;
use App\Ship\Parents\Dtos\DataTransferObject as ParentDataTransferObject;

class ChangeUsernameDto extends ParentDataTransferObject
{
    public string $username;
    public string $password;
    public string $newUsername;

    public static function fromRequest(ChangeUsernameRequest $request): self
    {
        return self::from([
            'username' => $request->getUsername(),
            'password' => $request->getPassword(),
            'newUsername' => $request->getNewUsername(),
        ]);
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getNewUsername(): string
    {
        return $this->newUsername;
    }
}
