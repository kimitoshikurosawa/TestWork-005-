<?php

namespace App\Providers;

use App\Interfaces\PetitionRepositoryInterface;
use App\Repositories\PetitionRepository;
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
        $this->app->bind(PetitionRepositoryInterface::class, PetitionRepository::class);
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
