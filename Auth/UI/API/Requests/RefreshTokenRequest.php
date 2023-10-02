<?php

namespace App\Containers\AppSection\Auth\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class RefreshTokenRequest extends ParentRequest
{
    public const REFRESH_TOKEN = 'refresh_token';
    public const USER_ID = 'user_id';

    public function rules(): array
    {
        return [
            self::REFRESH_TOKEN => [
                'string',
                'required',
            ],
            self::USER_ID => [
                'string',
                'required',
                'exists:users,id',
            ],
        ];
    }

    public function getRefreshToken(): string
    {
        return $this->get(self::REFRESH_TOKEN);
    }

    public function getUserId(): string
    {
        return $this->get(self::USER_ID);
    }
}
