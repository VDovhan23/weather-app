<?php

namespace App\System\Report\Providers;

class JsonProvider implements FormatProviderInterface
{

    public function formResponse(array $weatherReportArray)
    {
        return json_encode($weatherReportArray);
    }
}
