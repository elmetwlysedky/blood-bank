<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Builder;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this -> app->bind('path.public',function(){
            return base_path('public');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::defaultStringLength(191);

        Paginator::useBootstrap();


        View::share(['facebook'=> Setting::where('key', 'facebook')->get()->first(),
                    'twitter'=> Setting::where('key', 'twitter')->get()->first(),
                    'instagram'=> Setting::where('key', 'instagram')->get()->first(),
                    'youtube'=> Setting::where('key', 'youtube')->get()->first(),
                    'phone'=> Setting::where('key', 'phone')->get()->first(),
                    'email'=> Setting::where('key', 'email')->get()->first(),
                    'whats_app'=> Setting::where('key', 'whatsApp')->get()->first(),
                    'about'=> Setting::where('key', 'about')->get()->first(),
                    'who_we_are' => Setting::where('key', 'who_we_are')->get()->first(),

                    ]);


    }
}
