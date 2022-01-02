<?php

namespace App\Repositories\Report;

use App\DTO\ReportDTO;

interface ReportRepositoryInterface
{
    public function getReport(ReportDTO $reportDTO);
}
