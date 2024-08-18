<?php

namespace App\Providers;

use App\Http\Interfaces\API\AuthInterface;
use App\Http\Repositories\API\AuthRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            AuthInterface::class,
            AuthRepository::class
        );

    }



    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
