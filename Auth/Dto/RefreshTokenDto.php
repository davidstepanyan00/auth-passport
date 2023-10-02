<?php

namespace App\Containers\AppSection\Auth\Dto;

use App\Containers\AppSection\Auth\UI\API\Requests\RefreshTokenRequest;
use App\Ship\Parents\Dtos\DataTransferObject as ParentDataTransferObject;

class RefreshTokenDto extends ParentDataTransferObject
{
    public string $refreshToken;

    public static function fromRequest(RefreshTokenRequest $request): self
    {
        return self::from([
            'refreshToken' => $request->getRefreshToken(),
            'userId' => $request->getUserId(),
        ]);
    }
}
