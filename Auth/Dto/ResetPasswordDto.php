<?php

namespace App\Containers\AppSection\Auth\Dto;

use App\Containers\AppSection\Auth\UI\API\Requests\ResetPasswordRequest;
use App\Ship\Classes\Dtos\AmplitudeParamsDto;
use App\Ship\Parents\Dtos\DataTransferObject as ParentDataTransferObject;

class ResetPasswordDto extends ParentDataTransferObject
{
    public string $username;
    public string $password;

    public AmplitudeParamsDto $amplitude;

    public static function fromRequest(ResetPasswordRequest $request): self
    {
        return self::from([
           'username' => $request->getUsername(),
           'password' => $request->getPassword(),
           'amplitude' => AmplitudeParamsDto::fromRequest($request),
        ]);
    }
}
