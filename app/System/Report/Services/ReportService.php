<?php

namespace App\System\Report\Services;

use App\System\Report\DTO\ReportDTO;
use App\System\Report\Repositories\ReportRepositoryInterface;

class ReportService
{
    public function __construct(private ReportRepositoryInterface $reportRepository)
    {
    }

    public function getReport(array $airportList, string $format)
    {
        $reportDTO = new ReportDTO($airportList, $format);

        return $this->reportRepository->getReport($reportDTO);
    }

}
