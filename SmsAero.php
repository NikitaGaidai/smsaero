<?php


namespace SmsAero;

use Illuminate\Support\Facades\Facade;

class SmsAero extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'smsaero';
    }
}
