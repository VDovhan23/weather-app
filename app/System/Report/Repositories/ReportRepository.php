<?php

namespace App\System\Report\Repositories;

use App\System\Report\DTO\ReportDTO;
use App\System\Report\Facades\FormatFacade;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
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

        try {
            $content = $client->get($url)->getBody()->getContents();
        } catch (ClientException $clientException) {
            return $clientException->getMessage(); // mb can be modified in better way
        }

        return FormatFacade::provider($reportDTO->getFormat())->formResponse($content);

    }
}
