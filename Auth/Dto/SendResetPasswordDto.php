<?php

namespace App\Containers\AppSection\Auth\Dto;

use App\Ship\Parents\Dtos\DataTransferObject as ParenDataTransferObject;

class SendResetPasswordDto extends ParenDataTransferObject
{
    public string $url;

    public string $code;

    public static function fromParams(string $url, string $code): self
    {
        return self::from([
           'url' => $url,
           'code' => $code,
        ]);
    }
}
