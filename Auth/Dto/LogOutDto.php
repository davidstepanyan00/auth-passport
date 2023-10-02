<?php

namespace App\Containers\AppSection\Auth\Dto;

use App\Containers\AppSection\Auth\UI\API\Requests\LogOutRequest;
use App\Ship\Classes\Dtos\AmplitudeParamsDto;
use App\Ship\Parents\Dtos\DataTransferObject as ParentDataTransferObject;

class LogOutDto extends ParentDataTransferObject
{
    public AmplitudeParamsDto $amplitude;

    public static function fromRequest(LogOutRequest $request): self
    {
        return self::from([
            'amplitude' => AmplitudeParamsDto::fromRequest($request),
            'userId' => $request->user()->id,
        ]);
    }

}
