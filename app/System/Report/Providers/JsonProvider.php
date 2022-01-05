<?php

namespace App\System\Report\Providers;

use App\System\Report\Providers\AbstractFormatProvider;

class JsonProvider extends AbstractFormatProvider
{
    public function __construct()
    {
    }

    public function formResponse(string $content)
    {
        $weatherReportObject = $this->getWeatherReportObject($content);

        return json_encode($weatherReportObject);
    }
}
