<?php

namespace App\Containers\AppSection\Auth\Dto;

use App\Containers\AppSection\Auth\UI\API\Requests\LoginRequest;
use App\Ship\Classes\Dtos\AmplitudeParamsDto;
use App\Ship\Parents\Dtos\DataTransferObject as ParentDataTransferObject;

class LoginDto extends ParentDataTransferObject
{
    public string $username;

    public string $password;

    public AmplitudeParamsDto $amplitude;

    public static function fromRequest(LoginRequest $request): self
    {
        return self::from([
            'username' => $request->getUsername(),
            'password' => $request->getPassword(),
            'amplitude' => AmplitudeParamsDto::fromRequest($request),
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

    public function getIp(): ?string
    {
        return $this->ip;
    }
}
