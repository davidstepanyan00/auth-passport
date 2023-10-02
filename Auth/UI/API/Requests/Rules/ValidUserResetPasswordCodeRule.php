<?php

namespace App\Containers\AppSection\Auth\UI\API\Requests\Rules;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserResetPasswordCodeRepositoryInterface;
use Illuminate\Contracts\Validation\Rule;

class ValidUserResetPasswordCodeRule implements Rule
{
    public function __construct(protected string $username)
    {
    }

    public function passes($attribute, $value): bool
    {
        /**
         * @var UserResetPasswordCodeRepositoryInterface $userResetPasswordCodeRepository
         */
        $userResetPasswordCodeRepository = resolve(UserResetPasswordCodeRepositoryInterface::class);

        $resultsCount = $userResetPasswordCodeRepository
            ->byUsername($this->username)
            ->byCode($value)
            ->count();

        if (!$resultsCount) {
            return false;
        }

        return true;
    }

    public function message(): string
    {
        return __('errors.invalid_code');
    }
}
