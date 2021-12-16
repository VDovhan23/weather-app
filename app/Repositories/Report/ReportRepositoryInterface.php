<?php

namespace App\Repositories\Report;

use App\DTO\ReportDTO;

interface ReportRepositoryInterface
{
    public function createReport(ReportDTO $reportDTO);
}
