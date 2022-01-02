<?php

namespace App\System\Report\Repositories;

use App\System\Report\DTO\ReportDTO;
use App\System\Report\Facades\FormatFacade;
use GuzzleHttp\Client;
use Illuminate\Config\Repository;

class ReportRepository implements ReportRepositoryInterface
{
    public function __construct(private Repository $config)
    {
    }

    public function getReport(ReportDTO $reportDTO)
    {
        $url = sprintf('%s%s.TXT', $this->config->get('reports.url'), $reportDTO->getAirport());

        $client = new Client();

        $content = $client->get($url)->getBody()->getContents();

        $response = FormatFacade::provider($reportDTO->getFormat())->formResponse($content);

        return $response;

    }
}
