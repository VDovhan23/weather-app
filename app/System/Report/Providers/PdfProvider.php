<?php

namespace App\System\Report\Providers;

use Barryvdh\DomPDF\Facade as PDF;

class PdfProvider implements FormatProviderInterface
{

    public function formResponse(array $weatherReportArray)
    {
        $pdf = PDF::loadView('Report\report', ['report' => $weatherReportArray]);
        return $pdf->download('pdfview.pdf');
    }
}
