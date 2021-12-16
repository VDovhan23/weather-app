<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Services\ReportService;

class ReportController extends Controller
{
    public function __construct(private ReportService $reportService)
    {
    }

    public function report(ReportRequest $reportRequest)
    {
        $this->reportService->getReport($reportRequest->outputFormat);
    }
}
