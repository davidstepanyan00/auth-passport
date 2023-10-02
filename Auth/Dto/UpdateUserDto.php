<?php

namespace App\Containers\AppSection\Auth\Dto;

use App\Ship\Parents\Dtos\DataTransferObject as ParentDataTransferObject;

class UpdateUserDto extends ParentDataTransferObject
{
    public ?string $password;
    public string $displayName;

    public static function fromParams(
        string $displayName,
        string $teamMemberId,
    ): self {
        return self::from([
            'displayName' => $displayName,
            'userId' => $teamMemberId,
        ]);
    }
}
