<?php

namespace App\System\Report\Repositories;

use App\System\Report\DTO\ReportDTO;
use App\System\Report\Facades\FormatFacade;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Config\Repository;
use Illuminate\Support\Str;

class ReportRepository implements ReportRepositoryInterface
{
    public function __construct(private Repository $config)
    {
        $this->client = new Client();
    }

    public function getReport(ReportDTO $reportDTO)
    {
        $url = sprintf('%s%s.TXT', $this->config->get('reports.url'), $reportDTO->getAirport());

        try {
            $content = $this->client->get($url)->getBody()->getContents();
            $weatherReportArray = $this->getWeatherReportArray($content);

        } catch (ClientException $clientException) {
            return $clientException->getMessage(); // mb can be modified in better way
        }

        return FormatFacade::provider($reportDTO->getFormat())->formResponse($weatherReportArray);
    }


    private function getWeatherReportArray(string $content): array
    {
        $weatherArray = explode("\n", $content);

        $weatherObject = [
            'title' => null,
        ];

        foreach ($weatherArray as $item) {
            if (strpos($item, ': ')) {
                $item = explode(': ', $item);
                $name = Str::snake($item[0]);
                $weatherObject[$name] = $item[1];
            } else {
                $weatherObject['title'] .= $item;
            }
        }
        return $weatherObject;
    }
}
