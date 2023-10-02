<?php

namespace App\Containers\AppSection\Auth\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class ChangeUsernameRequest extends ParentRequest
{
    public const PASSWORD = 'password';

    public const USERNAME = 'username';

    public function rules(): array
    {
        return [
            self::PASSWORD => [
                'string',
                'required'
            ],
            self::USERNAME => [
                'email',
                'required',
                'unique:users'
            ],
        ];
    }


    public function getUsername(): string
    {
        return $this->user()->getUsername();
    }

    public function getPassword(): string
    {
        return $this->get(self::PASSWORD);
    }

    public function getNewUsername(): string
    {
        return $this->get(self::USERNAME);
    }
}
