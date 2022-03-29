<?php

namespace App\System\Report\Providers;

class HtmlProvider implements FormatProviderInterface
{
    public function formResponse(array $weatherReportArray)
    {
        return view('Report\report', ['report' => $weatherReportArray]);
    }
}
