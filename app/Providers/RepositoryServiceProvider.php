<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\MemberRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Repositories\MemberRepository;
use App\Repositories\ProductRepository;

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
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
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
