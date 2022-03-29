<?php

namespace System\Services;

use App\System\Report\DTO\ReportDTO;
use App\System\Report\Repositories\ReportRepositoryInterface;
use App\System\Report\Services\ReportService;
use Tests\TestCase;

class ReportServiceTest extends TestCase
{

    public function testGetReport()
    {
        $contentType = 'text';

        $airport = 'fakeAirport';

        $reportDTO = new ReportDTO('fakeAirport', 'text');

        $weatherReportArray = [
            'title' => 'some data',
        ];

        $reportRepositoryMock = $this->getMockBuilder(ReportRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $reportRepositoryMock->expects($this->once())
            ->method('getReport')
            ->with($reportDTO)
            ->willReturn($weatherReportArray);

        $result = (new ReportService($reportRepositoryMock))->getReport($airport, $contentType);

        $this->assertEquals($result, $weatherReportArray);
    }
}
