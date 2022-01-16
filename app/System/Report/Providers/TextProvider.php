<?php

namespace App\System\Report\Providers;

class TextProvider extends AbstractFormatProvider
{

    public function formResponse(string $content)
    {
        return $content;
    }
}
