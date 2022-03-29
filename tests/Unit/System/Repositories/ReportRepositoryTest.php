<?php

namespace System\Repositories;

use App\System\Report\DTO\ReportDTO;
use App\System\Report\Facades\FormatFacade;
use App\System\Report\Providers\FormatProviderInterface;
use App\System\Report\Repositories\ReportRepository;
use GuzzleHttp\Client;
use Illuminate\Config\Repository;
use Tests\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class ReportRepositoryTest extends TestCase
{

    public function test_get_report()
    {
        $reportDTO = new ReportDTO('BLA', 'fake_format');

        $format = $reportDTO->getFormat();

        $configMock = $this->getMockBuilder(Repository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $configMock->expects($this->once())
            ->method('get')
            ->willReturn('https://example.com/');

        $guzzleClientReturnedData = 'fake data';

        $clientMock = $this->getMockBuilder(Client::class)
            ->disableOriginalConstructor()
            ->getMock();

        $clientMock->expects($this->once())
            ->method('get')
            ->willReturnCallback(function () use ($guzzleClientReturnedData) {
                $response = $this->getMockBuilder(ResponseInterface::class)
                    ->disableOriginalConstructor()
                    ->getMock();

                $response->expects($this->once())
                    ->method('getBody')
                    ->willReturnCallback(function () use ($guzzleClientReturnedData) {
                        $stream = $this->getMockBuilder(StreamInterface::class)
                            ->disableOriginalConstructor()
                            ->getMock();

                        $stream->expects($this->once())
                            ->method('getContents')
                            ->willReturn($guzzleClientReturnedData);

                        return $stream;
                    });
                return $response;
            });

        $formatProviderMock = $this->getMockBuilder(FormatProviderInterface::class)
            ->getMock();

        $weatherReportArray = [
            'title' => $guzzleClientReturnedData,
        ];

       FormatFacade::shouldReceive('provider')
            ->once()
            ->with($reportDTO->getFormat())
            ->andReturn($formatProviderMock);

         $formatProviderMock->expects($this->once())
            ->method('formResponse')
            ->with($weatherReportArray)
            ->willReturn($weatherReportArray);

        $reportRepository = new ReportRepository($configMock);

        $reportRepository->client = $clientMock;

        $result = $reportRepository->getReport($reportDTO);

        $this->assertEquals($result, $weatherReportArray);
    }
}
