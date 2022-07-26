<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Destinations\DestinationService;

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
      $destinationService = new DestinationService();
        view()->share('popularDestinations',$destinationService->showDestinationData());
    }
}
