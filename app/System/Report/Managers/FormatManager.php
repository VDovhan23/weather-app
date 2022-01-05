<?php

namespace App\System\Report\Managers;

use App\System\Report\Providers\HtmlProvider;
use App\System\Report\Providers\JsonProvider;
use App\System\Report\Providers\PdfProvider;
use Webmozart\Assert\InvalidArgumentException;

class FormatManager
{
    public function provider(string $format)
    {
        $driverMethod = 'create'. ucfirst($format).'Provider';

        if (! method_exists($this, $driverMethod)){
            throw new InvalidArgumentException(sprintf('Format [%s] is not supported', $format));
        }

        return $this->{$driverMethod}();
    }


    private function createJsonProvider(): JsonProvider
    {
       return new JsonProvider();
    }

    private function createPdfProvider(): PdfProvider {
        return new PdfProvider();
    }

    private function createHtmlProvider(): HtmlProvider {
        return new HtmlProvider();
    }

}
