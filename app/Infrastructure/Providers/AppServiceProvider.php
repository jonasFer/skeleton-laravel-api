<?php

namespace App\Infrastructure\Providers;

use App\Domain\Persistence\Repository\Auth\UserRepositoryInterface;
use App\Domain\Services\User\CreateUserService;
use App\Domain\Services\User\CreateUserServiceInterface;
use App\Infrastructure\Persistence\Repository\Auth\UserRepository;
use App\Infrastructure\Services\Security\LoginService;
use App\Infrastructure\Services\Security\LoginServiceInterface;
use App\Infrastructure\Services\Security\LogoutPostService;
use App\Infrastructure\Services\Security\LogoutPostServiceInterface;
use App\Infrastructure\Services\Security\UserLoggedGetService;
use App\Infrastructure\Services\Security\UserLoggedGetServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CreateUserServiceInterface::class, CreateUserService::class);
        $this->app->bind(LoginServiceInterface::class, LoginService::class);
        $this->app->bind(UserLoggedGetServiceInterface::class, UserLoggedGetService::class);
        $this->app->bind(LogoutPostServiceInterface::class, LogoutPostService::class);
        // repositories
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
