<?php

namespace SmsAero;

use SmsAero\Commands\InstallCommand;
use SmsAero\Contracts\ApiContract;
use Illuminate\Support\ServiceProvider;

class SmsAeroServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(SmsAeroManager::class, function () {
            return new SmsAeroManager();
        });

        $this->app->alias(SmsAeroManager::class, ApiContract::class);
    }

    public function boot() {
        if ($this->app->runningInConsole()) {

            $this->commands([
                InstallCommand::class,
            ]);

            $this->publishes([
                __DIR__.'/config/smsaero.php' => config_path('smsaero.php')
            ], ['public', 'smsaero']);
        }
    }
}
