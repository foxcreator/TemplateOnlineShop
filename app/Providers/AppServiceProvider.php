<?php

namespace App\Providers;

use App\Notifications\TelegramNotificationsChannelForAdmin;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->app->when(TelegramNotificationsChannelForAdmin::class)
            ->needs(TelegramBot::class)
            ->give(function () {
                return new TelegramBot(config('services.telegram.bot_token'));
            });

        Paginator::useBootstrapFive();
    }
}
