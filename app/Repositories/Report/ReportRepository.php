<?php

namespace App\Repositories\Report;

use App\DTO\ReportDTO;
use GuzzleHttp\Client;
use Illuminate\Config\Repository;

class ReportRepository implements ReportRepositoryInterface
{
    public function __construct(private Repository $config)
    {
    }

    public function getReport(ReportDTO $reportDTO)
    {
        $url = sprintf('%s%s.TXT', $this->config->get('reports.url'), 'KBOS');

        $client = new Client();

        $response = $client->get($url);

        return response($response->getBody()->getContents());

    }
}
