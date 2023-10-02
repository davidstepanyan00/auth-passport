<?php

namespace App\Containers\AppSection\Auth\UI\API\Requests;

use App\Containers\AppSection\Auth\UI\API\Requests\Rules\ValidUserResetPasswordCodeRule;
use App\Ship\Parents\Requests\Request as ParentRequest;

class ChangeTempPasswordRequest extends ParentRequest
{
    public const USERNAME = 'username';
    public const TMP_PASSWORD = 'tmpPassword';
    public const PASSWORD = 'password';
    public const CONFIRM_PASSWORD = 'confirmPassword';

    public function rules(): array
    {
        return [
            self::USERNAME => [
                'email',
                'required',
            ],

            self::TMP_PASSWORD => [
                'string',
                'required',
                new ValidUserResetPasswordCodeRule($this->getUsername())
            ],

            self::PASSWORD => [
                'required',
                'min:8',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@!$#%.&+-?*]).*$/',
            ],

            self::CONFIRM_PASSWORD => [
                'string',
                'required',
                'same:password',
            ]
        ];
    }

    public function getPassword(): string
    {
        return $this->get(self::PASSWORD);
    }

    public function getUsername(): string
    {
        return $this->get(self::USERNAME);
    }
}
