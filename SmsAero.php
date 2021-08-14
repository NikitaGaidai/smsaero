<?php


namespace SmsAero;

use Illuminate\Support\Facades\Facade;
use SmsAero\Contracts\ApiContract;

class SmsAero extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ApiContract::class;
    }
}
