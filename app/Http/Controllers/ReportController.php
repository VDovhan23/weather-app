<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\System\Report\Services\ReportService;

class ReportController extends Controller
{
    public function __construct(private ReportService $reportService)
    {
    }

    /**
     * @OA\Get(
     *     path="/report",
     *     @OA\Response(response="200", description="Get weather report.")
     * )
     */
    public function report(ReportRequest $reportRequest)
    {
       return $this->reportService->getReport($reportRequest->airport, $reportRequest->output_format);
    }
}
