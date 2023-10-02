<?php

namespace App\Containers\AppSection\Auth\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class LoginRequest extends ParentRequest
{
    public const USERNAME = 'username';
    public const PASSWORD = 'password';

    public function rules(): array
    {
        return [
            self::USERNAME => [
                'required',
                'string',
                'max:255',
            ],
            self::PASSWORD => [
                'string',
                'required',
                'min:8',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@!$#%.&+-?*]).*$/',
            ],
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

    public function messages(): array
    {
        return [
            'password' => __('appSection@auth::validation.password'),
        ];
    }
}
