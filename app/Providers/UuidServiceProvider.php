<?php

namespace App\Providers;
namespace Webpatser\Uuid;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class UuidServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('uuid', function ($attribute, $value, $parameters, $validator) {
            return Uuid::validate($value);
        });
    }
}
