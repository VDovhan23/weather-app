<?php

namespace App\System\Report\Providers;

class HtmlProvider extends AbstractFormatProvider
{
    public function formResponse(string $content)
    {
        $weatherReportObject = $this->getWeatherReportObject($content);

        return view('Report\report', ['report' => $weatherReportObject]);
    }
}
