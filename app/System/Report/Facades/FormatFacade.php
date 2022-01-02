<?php

namespace App\System\Report\Facades;

use Illuminate\Support\Facades\Facade;

class FormatFacade extends Facade
{

    protected static function getFacadeAccessor(): string
    {
        return 'System\Report\Managers\FormatManager';
    }

}
