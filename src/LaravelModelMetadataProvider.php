<?php

namespace Erwan\LaravelModelMetadata;

use Illuminate\Support\ServiceProvider;

class LaravelModelMetadataProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
       $this->publishes([
            __DIR__.'/config/model_metadata.php' => config_path('model_metadata.php')
        ]);
   }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/model_metadata.php', 'model_metadata'
        );
    }
}
