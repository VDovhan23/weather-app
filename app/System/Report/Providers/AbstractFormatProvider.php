<?php

namespace App\System\Report\Providers;

use Illuminate\Support\Str;

abstract class AbstractFormatProvider
{
    public abstract function formResponse(string $content);

    protected function getWeatherReportObject(string $content): array
    {
        $weatherArray = explode("\n", $content);

        $weatherObject = [
            'title' => '',
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
