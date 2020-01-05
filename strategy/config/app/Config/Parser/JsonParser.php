<?php

namespace App\Config\Parser;

use App\Config\Contracts\ParserInterface;

class JsonParser implements ParserInterface
{
    public function parse($file)
    {
        return json_decode(file_get_contents($file), true);
    }
}