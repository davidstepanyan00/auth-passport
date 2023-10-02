<?php

namespace App\Containers\AppSection\Auth\Dto;

use App\Ship\Parents\Dtos\DataTransferObject as ParentDataTransferObject;

class SendConfirmationEmailDto extends ParentDataTransferObject
{
    public ?string $url;
}
