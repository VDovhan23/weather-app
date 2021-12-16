<?php

namespace App\Services;

use App\DTO\ReportDTO;
use App\Repositories\Report\ReportRepositoryInterface;

class ReportService
{
    public function __construct(private ReportRepositoryInterface $reportRepository)
    {
    }

    public function getReport(array $airportList, string $format)
    {
        $reportDTO = new ReportDTO($airportList, $format);

        return $this->reportRepository->createReport($reportDTO);
    }

}
