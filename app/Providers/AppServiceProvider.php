<?php

namespace App\Providers;

use App\Models\Config;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use ConsoleTVs\Charts\Registrar as Charts;

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
    public function boot(Charts $charts)
    {
        Paginator::useBootstrapFive();

        foreach(config('abilities') as $ability => $label){
            Gate::define($ability, function ($user) use($ability) {
                foreach($user->roles as $role){
                    if(in_array($ability,$role->abilities)){
                        return true;
                    }
                    return false;
                }
                
            });
        }
        $config = Config::find(1);
        View::share('config', $config);

        $charts->register([
            \App\Charts\SampleChart::class,
            \App\Charts\UserChart::class
        ]);
    }
}
