<?php

namespace App\Providers;

use App\Services\AuthService;
use App\Services\IAuthService;
use Illuminate\Support\ServiceProvider;
use App\Service\IPerfilService;
use App\Service\PerfilService;

class ServiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            IAuthService::class,
            AuthService::class
        );

        $this->app->bind(
            IPerfilService::class,
            PerfilService::class
        );
    }
}
