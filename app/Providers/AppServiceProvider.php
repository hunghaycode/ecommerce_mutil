<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        Paginator::useBootstrap();
        // set time zone
        $generalSetting = GeneralSetting::first();
        
        Config::set('app.timezone',$generalSetting->time_zone);
           // share all variable for view
           View::composer('*',function($view)use($generalSetting){
            $view->with('settings',$generalSetting);
           });
    }
}
