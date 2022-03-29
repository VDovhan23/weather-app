<?php

namespace App\System\Report\Providers;

class TextProvider implements FormatProviderInterface
{

    public function formResponse($weatherReportArray)
    {
        return $weatherReportArray;
    }
}
