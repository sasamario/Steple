<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


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
        //Herokuで利用できるメモリの上限を超えてしまい機能しなくなってしまう為、文字数デフォルト255のところを191と指定
        Schema::defaultStringLength(191);

        // 本番環境(Heroku)でhttpsを強制する
        if (App::environment('production')) {
            URL::forceScheme('https');
        }

    }
}
