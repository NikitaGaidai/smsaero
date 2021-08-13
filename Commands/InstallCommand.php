<?php

namespace SmsAero\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'smsaero:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs package.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->line('Register SmsAeroServiceProvider and SmsAeroFacade in your config/app.php file.');
        $this->line('See full documentation at https://smsaero.ru/description/api/.');

        $this->info('Installation started.');

        // Publish config
        $this->call('vendor:publish', ['--tag' => 'smsaero']);
        $path = config_path('smsaero.php');

        // Update Data
        $email = $this->ask('Enter your email');
        if (!is_null($email)) $this->updateEmail($path, $email);

        $api_key = $this->ask('Enter your API key');
        if (!is_null($api_key)) $this->updateApiKey($path, $api_key);

        $sign = $this->ask('Enter your sign (leave empty to use default)');
        if (!is_null($sign)) $this->updateSign($path, $sign);

        $this->info('Installation completed.');

        // Inform about next actions
        $this->newLine();
        $this->line('Register SmsAeroServiceProvider and SmsAeroFacade in your config/app.php file.');
        $this->line('See full documentation at https://smsaero.ru/description/api/.');

        return 0;
    }

    private function updateEmail($path, $email) {
        $file_content = file_get_contents($path);

        $start_pos = strpos($file_content, '\'email\'');
        $length = strpos($file_content, '\'api_key\'') - $start_pos;
        $subStr = substr($file_content, $start_pos, $length);
        $subStrUpdated = preg_replace('/(mail@domain.ru)/', $email, $subStr);
        $file_content = str_replace($subStr, $subStrUpdated, $file_content);

        file_put_contents($path, $file_content);
    }

    private function updateApiKey($path, $api_key) {
        $file_content = file_get_contents($path);

        $start_pos = strpos($file_content, '\'api_key\'');
        $length = strpos($file_content, '\'sign\'') - $start_pos;
        $subStr = substr($file_content, $start_pos, $length);
        $subStrUpdated = preg_replace('/(API_KEY)/', $api_key, $subStr);
        $file_content = str_replace($subStr, $subStrUpdated, $file_content);

        file_put_contents($path, $file_content);
    }

    private function updateSign($path, $sign) {
        $file_content = file_get_contents($path);

        $start_pos = strpos($file_content, '\'sign\'');
        $length = strpos($file_content, '];') - $start_pos;
        $subStr = substr($file_content, $start_pos, $length);
        $subStrUpdated = preg_replace('/(SMS Aero)/', $sign, $subStr);
        $file_content = str_replace($subStr, $subStrUpdated, $file_content);

        file_put_contents($path, $file_content);
    }
}
