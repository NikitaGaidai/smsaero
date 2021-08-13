<?php

namespace SmsAero;

use SmsAero\Commands\InstallCommand;
use SmsAero\Contracts\ApiContract;
use Illuminate\Support\ServiceProvider;

class SmsAeroServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(SmsAero::class, function () {
            return new SmsAero();
        });

        $this->app->alias(SmsAero::class, ApiContract::class);
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
