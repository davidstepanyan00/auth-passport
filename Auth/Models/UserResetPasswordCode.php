<?php

namespace App\Containers\AppSection\Auth\Models;

use App\Containers\AppSection\Auth\Data\Factories\UserResetPasswordCodeFactory;
use App\Ship\Parents\Models\Model as ParentModel;

/**
 * @property mixed $code
 */
class UserResetPasswordCode extends ParentModel
{
    protected $table = 'user_reset_password_codes';

    public $timestamps = false;

    protected $fillable = [
      'username',
      'code',
    ];

    public static function createModel(string $username, string $code): array
    {
        return [
            'username' => $username,
            'code' => $code,
        ];
    }

    protected static function newFactory(): UserResetPasswordCodeFactory
    {
        return new UserResetPasswordCodeFactory();
    }
}
