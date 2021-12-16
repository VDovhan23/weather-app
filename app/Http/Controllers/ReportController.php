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
       return $this->reportService->getReport($reportRequest->airport_list, $reportRequest->output_format);
    }
}
