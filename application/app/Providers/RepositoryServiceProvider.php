<?php

namespace App\Providers;

class RepositoryServiceProvider extends AppServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            'App\Interfaces\RepositoryInterface',
            'App\Repositories\BaseRepository'
        );
        $this->app->bind(
            'App\Interfaces\EventInterface',
            'App\Repositories\EventRepository'
        );
    }

}
