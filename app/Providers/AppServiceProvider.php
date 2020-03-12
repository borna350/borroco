<?php

namespace App\Providers;

use App\Models\FollowUs;
use App\Models\FooterInfo;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        $follows = FollowUs::where('status', 'active')->get();
        View::share('follows', $follows);
        
        $info = FooterInfo::first();
        View::share('info', $info);

        Schema::defaultStringLength(191);
    }
}
