<?php

namespace App\Containers\AppSection\Auth\Data\Factories;

use App\Containers\AppSection\Auth\Models\UserResetPasswordCode;
use App\Ship\Parents\Factories\Factory as ParentFactory;
use App\Ship\Parents\Support\Str;

class UserResetPasswordCodeFactory extends ParentFactory
{
    protected $model = UserResetPasswordCode::class;

    public function definition(): array
    {
        return [
            'code' => Str::random(8),
        ];
    }
}
