<?php

namespace Arifsajal\MobireachSmsGateway\Facades;

use Illuminate\Support\Facades\Facade;

class Mobireach extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'mobireachsmsgateway';
    }
}
