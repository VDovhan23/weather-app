<?php

namespace App\System\Report\Managers;

use App\System\Report\Providers\FormatProviderInterface;
use App\System\Report\Providers\Json\JsonProvider;
use http\Exception\InvalidArgumentException;

class FormatManager
{
    public function provider(string $format)
    {
        $driverMethod = 'create'. ucfirst($format).'Provider';

        if (! method_exists($this, $driverMethod)){
            throw new InvalidArgumentException(sprintf('Format [%s] is not supported', $format));
        }

        return $this->{$driverMethod}();
    }


    private function createJsonProvider(): FormatProviderInterface
    {
       return new JsonProvider();
    }

}
