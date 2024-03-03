<?php

namespace App\Providers;

use App\Livewire;
use Illuminate\Support\Facades\Blade;
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
        Blade::directive('livewire',function ($expression){
            //dd($expression);

/*            return "<?= (new Livewire())->initialRender($expression) ?>";*/
            return "{!! (new Livewire())->initialRender({$expression}) !!}";
        });
    }
}
