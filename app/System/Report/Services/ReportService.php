<?php

namespace App\System\Report\Services;

use App\System\Report\DTO\ReportDTO;
use App\System\Report\Repositories\ReportRepositoryInterface;

class ReportService
{
    public function __construct(private ReportRepositoryInterface $reportRepository)
    {
    }

    public function getReport(string $airport, string $contentType)
    {
        $format = $this->getOutputFormat($contentType);

        $reportDTO = new ReportDTO($airport, $format);

        return $this->reportRepository->getReport($reportDTO);
    }


    private function getOutputFormat(string $format): string
    {
        $allowedFormats = config('reports.allowedFormats');

        if (!array_key_exists($format, $allowedFormats)) {
            throw new \Exception('Format is not allowed');
        }

        return $allowedFormats[$format];
    }

}
