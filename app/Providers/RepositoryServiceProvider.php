<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\MemberRepositoryInterface;
use App\Repositories\MemberRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MemberRepositoryInterface::class, MemberRepository::class);
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
