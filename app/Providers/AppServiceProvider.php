<?php

namespace App\Providers;

use App\Models\Journey;
use App\Models\Menu;
use App\Models\Refund;
use App\Models\Section;
use App\Models\Service;
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
        view()->composer('includes.header', function ($view) {
            $view->with('section', Section::findOrFail(1));
        });

        view()->composer('includes.menu', function ($view) {
            $view->with('menus', Menu::all());
        });

        view()->composer('includes.service', function ($view) {
            $view->with('services', Service::all());
        });

        view()->composer('includes.service', function ($view) {
            $view->with('section', Section::findOrFail(2));
        });

        view()->composer('includes.about', function ($view) {
            $view->with('section', Section::findOrFail(3));
        });

        view()->composer('includes.price', function ($view) {
            $view->with('section', Section::findOrFail(4));
        });

        view()->composer('service.show', function ($view) {
            $view
                ->with('others', Service::all())
                ->with('journeys', Journey::all())
                ->with('section', Refund::all());
        });


    }
}
