<?php

namespace App\System\Report\Facades;

use App\System\Report\Providers\AbstractFormatProvider;
use Illuminate\Support\Facades\Facade;

/**
 * @method static AbstractFormatProvider provider(string $format)
 */
class FormatFacade extends Facade
{

    protected static function getFacadeAccessor(): string
    {
        return 'App\System\Report\Managers\FormatManager';
    }

}
