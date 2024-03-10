<?php

namespace App\Providers;

use App\Infra\Repositories\Interface\ILivroRepository;
use App\Infra\Repositories\LivroRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ILivroRepository::class, LivroRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
