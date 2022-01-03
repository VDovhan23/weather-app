<?php

namespace App\System\Report\Providers;

use Barryvdh\DomPDF\Facade as PDF;

class PdfProvider extends AbstractFormatProvider
{

    public function formResponse(string $content)
    {
        $weatherReportObject = $this->getWeatherReportObject($content);

        $pdf = PDF::loadView('Report\report', ['report' => $weatherReportObject]);
        return $pdf->download('pdfview.pdf');
    }
}
