<?php

namespace System\Managers;

use App\System\Report\Facades\FormatFacade;
use App\System\Report\Providers\FormatProviderInterface;
use InvalidArgumentException;
use Tests\TestCase;

class FormatManagerTest extends TestCase
{
    public function test_we_can_get_provider()
    {
        $format = 'json';

        $provider = FormatFacade::provider($format);

        $this->assertInstanceOf(FormatProviderInterface::class, $provider);
    }


    public function test_we_can_catch_exception_on_resolve_method()
    {
        $format = 'nonExist';

        $this->expectException(InvalidArgumentException::class);
        $this->expectDeprecationMessage('Format [nonExist] is not supported.');

        FormatFacade::provider($format);
    }
}
