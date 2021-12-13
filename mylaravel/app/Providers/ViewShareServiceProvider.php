<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Libraries\CategoryComposer;
use App\Libraries\ProductHotComposer;
use App\Libraries\CartComposer;

class ViewShareServiceProvider extends ServiceProvider
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
       View::composer('Home.*', ProductHotComposer::class);
       View::composer('Home.*', CategoryComposer::class);
       View::composer('Home.*', CartComposer::class);
    }
}