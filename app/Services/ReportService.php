<?php

namespace App\Services;

use App\Repositories\Report\ReportRepositoryInterface;

class ReportService
{
    public function __construct(private ReportRepositoryInterface $reportRepository)
    {
    }

    public function getReport(string $format)
    {
        $this->reportRepository->createReport($format);
    }

}
