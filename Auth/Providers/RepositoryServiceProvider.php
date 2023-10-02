<?php

namespace App\Containers\AppSection\Auth\Providers;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\OauthClientRepositoryInterface;
use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\RoleRepositoryInterface;
use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserResetPasswordCodeRepositoryInterface;
use App\Containers\AppSection\Auth\Data\Repositories\OauthClientRepository;
use App\Containers\AppSection\Auth\Data\Repositories\RoleRepository;
use App\Containers\AppSection\Auth\Data\Repositories\UserRepository;
use App\Containers\AppSection\Auth\Data\Repositories\UserResetPasswordCodeRepository;
use App\Ship\Providers\RepositoryServiceProvider as ParentRepositoryServiceProvider;

class RepositoryServiceProvider extends ParentRepositoryServiceProvider
{
    public function register(): void
    {
        parent::register();


        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            UserResetPasswordCodeRepositoryInterface::class,
            UserResetPasswordCodeRepository::class,
        );

        $this->app->bind(
            RoleRepositoryInterface::class,
            RoleRepository::class
        );

        $this->app->bind(
            OauthClientRepositoryInterface::class,
            OauthClientRepository::class,
        );
    }
}
