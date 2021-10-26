<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\Transaction;
use App\Observers\OrderObserver;
use App\Observers\TransactionObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Order::observe(OrderObserver::class);
        Transaction::observe(TransactionObserver::class);
    }
}
