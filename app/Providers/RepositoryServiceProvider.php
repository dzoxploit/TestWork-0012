<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\MemberRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Repositories\MemberRepository;
use App\Repositories\ProductRepository;

use App\Interfaces\TransactionRepositoryInterface;
use App\Interfaces\DetailTransactionRepositoryInterface;
use App\Repositories\TransactionRepository;
use App\Repositories\DetailTransactionRepository;

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
        $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);
        $this->app->bind(DetailTransactionRepositoryInterface::class, DetailTransactionRepository::class);
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
