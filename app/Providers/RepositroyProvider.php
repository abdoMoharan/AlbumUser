<?php

namespace App\Providers;

use App\Interface\AlbumInterface;
use App\Repository\AlbumRepository;
use Illuminate\Support\ServiceProvider;

class RepositroyProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AlbumInterface::class,AlbumRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
