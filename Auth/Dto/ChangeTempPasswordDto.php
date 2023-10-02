<?php

namespace App\Containers\AppSection\Auth\Dto;

use App\Containers\AppSection\Auth\UI\API\Requests\ChangeTempPasswordRequest;
use App\Ship\Parents\Dtos\DataTransferObject as ParentDataTransferObject;

class ChangeTempPasswordDto extends ParentDataTransferObject
{
    public string $username;
    public string $password;

    public static function fromRequest(ChangeTempPasswordRequest $request): self
    {
        return self::from([
            'username' => $request->getUsername(),
            'password' => $request->getPassword(),
        ]);
    }
}
