<?php

namespace App\Containers\AppSection\Auth\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class ForgetPasswordRequest extends ParentRequest
{
    public const USERNAME = 'username';

    public function rules(): array
    {
        return [
            self::USERNAME => [
                'email',
                'required',
                'exists:users'
            ],
        ];
    }

    public function getUsername(): string
    {
        return $this->get(self::USERNAME);
    }

    public function messages(): array
    {
        return [
            'username.exists' => __('appSection@auth::errors.user_not_exists_for_change_password'),
        ];
    }
}
