<?php

namespace App\Containers\AppSection\Auth\Providers;

use App\Ship\Parents\Providers\ModuleServiceProvider as ParentModuleServiceProvider;
use Illuminate\Support\Facades\Validator;

class ModuleServiceProvider extends ParentModuleServiceProvider
{
    public array $serviceProviders = [
        RepositoryServiceProvider::class,
    ];

    /**
     * Container Aliases
     */
    public array $aliases = [

    ];

    private function registerReCaptchaValidator(): void
    {
        Validator::extend('recaptcha', 'App\Containers\AppSection\Auth\Data\Validators\Recaptcha@validate');
    }
}
