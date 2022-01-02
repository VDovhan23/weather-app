<?php

namespace App\System\Report\Providers\Json;

use App\System\Report\Providers\FormatProviderInterface;
use stdClass;

class JsonProvider implements FormatProviderInterface
{

    public function formResponse(string $content)
    {
        $weatherArray = $this->getWeatherArray($content);

        return json_encode($weatherArray);
    }


    private function getWeatherArray(string $content): stdClass
    {
        $weatherArray = explode("\n", $content);

        $obj = new stdClass();
        $obj->title = '';
        foreach ($weatherArray as $k => $v) {
            if (strpos($v, ': ')){
                $item = explode(': ', $v);
                $name = $item[0];
                $obj->$name = $item[1];
            }
            else{
                $obj->title .= $v;
            }
        }

        return $obj;
    }
}
