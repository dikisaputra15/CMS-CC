<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('max_upload_size', function ($attribute, $value, $parameters, $validator) {
            $maxSize = $parameters[0] * 1024;
            return $value->getSize() <= $maxSize;
        });
    }
}
