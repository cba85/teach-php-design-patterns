<?php

namespace App\Config\Parser;

use App\Config\Contracts\ParserInterface;

class ArrayParser implements ParserInterface
{
    public function parse($file)
    {
        return require $file;
    }
}