<?php

namespace App\System\Report\Providers;

use Illuminate\Support\Str;
use stdClass;

abstract class AbstractFormatProvider
{
    public abstract function formResponse(string $content);

    protected function getWeatherReportObject(string $content): stdClass
    {
        $weatherArray = explode("\n", $content);

        $weatherObject = new stdClass();
        $weatherObject->title = '';
        foreach ($weatherArray as $item) {
            if (strpos($item, ': ')){
                $item = explode(': ', $item);
                $name = Str::snake($item[0]);
                $weatherObject->$name = $item[1];
            }
            else{
                $weatherObject->title .= $item;
            }
        }

        return $weatherObject;
    }

}
