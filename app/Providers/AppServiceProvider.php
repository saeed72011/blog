<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Pagination\Paginator;
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
        // Using view composer to set following variables globally
        view()->composer('*',function($view) {
            $view->with('setting', Setting::query()->firstOrCreate());
        });
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
//        \Illuminate\Support\Facades\Artisan::call('storage:link');

        Relation::enforceMorphMap([
            'category' => 'App\Models\Category',
            'user'     => 'App\Models\User',
            'article'  => 'App\Models\Article',
            'portfolio'  => 'App\Models\Portfolio',
        ]);
    }
}
