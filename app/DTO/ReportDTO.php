<?php

namespace App\DTO;

class ReportDTO
{
    public function __construct( public array $airportList, public string $format)
    {
    }

    public function getFormat(): string
    {
        return $this->format;
    }

    public function getAirportList(): array
    {
        return $this->airportList;
    }

}
