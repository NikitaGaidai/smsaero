<?php

namespace SmsAero;

use App\SmsAero\Commands\InstallCommand;
use App\SmsAero\Contracts\ApiContract;
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
