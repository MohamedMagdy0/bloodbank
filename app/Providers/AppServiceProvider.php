<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{



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
        Paginator::useBootstrapFive();

        $settings = Setting::first();
        view()->share(compact('settings'));


    }
}
