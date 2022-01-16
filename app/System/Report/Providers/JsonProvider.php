<?php

namespace App\System\Report\Providers;

class JsonProvider extends AbstractFormatProvider
{

    public function formResponse(string $content)
    {
        $weatherReportObject = $this->getWeatherReportObject($content);

        return json_encode($weatherReportObject);
    }
}
