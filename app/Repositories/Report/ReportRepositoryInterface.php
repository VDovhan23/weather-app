<?php

namespace App\Repositories\Report;

interface ReportRepositoryInterface
{
    public function createReport(string $format);
}
