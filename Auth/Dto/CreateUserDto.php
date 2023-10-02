<?php

namespace App\Containers\AppSection\Auth\Dto;

use App\Ship\Classes\Dtos\AmplitudeParamsDto;
use App\Ship\Parents\Dtos\DataTransferObject as ParentDataTransferObject;
use App\Ship\Parents\Requests\Request as ParentRequest;

class CreateUserDto extends ParentDataTransferObject
{
    public string $username;
    public ?string $password;
    public ?string $displayName;
    public bool $confirmationEmail = true;
    public ?AmplitudeParamsDto $amplitude;
    public bool $test = false;
    public ?string $parentRefCode;

    public static function fromRequest(ParentRequest $request): self
    {
        return self::from([
            ...$request->all(),
            'parentRefCode' => $request->cookie('parentRefCode'),
            'amplitude' => AmplitudeParamsDto::fromRequest($request),
        ]);
    }

    public static function fromParams(
        string $email,
        ?string $password,
        bool $confirmationEmail,
        bool $test = false,
        array $additionalData = [],
    ): self {
        return self::from([
            'username' => $email,
            'password' => $password,
            'confirmationEmail' => $confirmationEmail,
            'test' => $test,
            'parentRefCode' => $additionalData['parentRefCode'] ?? null,
        ]);
    }
}
