<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Routing\UrlGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *  if(env("REDIRECT_HTTPS")){
            $url->formatScheme('https');
        }
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
      
    }

    /**
     * Register any application services.
     *
       // if(env("REDIRECT_HTTPS")){
       //      $this->app['request']->server->set('https');
       //  }
     * @return void
     */
    public function register()
    {
    }
}
