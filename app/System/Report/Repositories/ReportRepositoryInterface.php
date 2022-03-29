<?php

namespace App\System\Report\Repositories;

use App\System\Report\DTO\ReportDTO;

interface ReportRepositoryInterface
{
    public function getReport(ReportDTO $reportDTO);
}
