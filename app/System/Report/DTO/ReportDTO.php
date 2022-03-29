<?php

namespace App\System\Report\DTO;

class ReportDTO
{
    public function __construct( public string $airport, public string $format)
    {
    }

    public function getFormat(): string
    {
        return $this->format;
    }

    public function getAirport(): string
    {
        return $this->airport;
    }

}
