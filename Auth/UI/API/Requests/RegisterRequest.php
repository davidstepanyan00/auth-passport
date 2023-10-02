<?php

namespace App\Containers\AppSection\Auth\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class RegisterRequest extends ParentRequest
{
    public const USERNAME = 'username';
    public const PASSWORD = 'password';
    public const PASSWORD_CONFIRMATION = 'password_confirmation';

    public function rules(): array
    {
        return [
            self::USERNAME => [
                'required',
                'email',
                'unique:users',
                'max:255',
            ],
            self::PASSWORD => [
                'required',
                'min:8',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@!$#%.&+-?*]).*$/',
            ],

            self::PASSWORD_CONFIRMATION => [
                'string',
                'required',
                'same:password',
            ]
        ];
    }

    public function getUsername(): string
    {
        return $this->get(self::USERNAME);
    }

    public function getPassword(): string
    {
        return $this->get(self::PASSWORD);
    }
}
