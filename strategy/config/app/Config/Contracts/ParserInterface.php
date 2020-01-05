<?php

namespace App\Config\Contracts;

interface ParserInterface
{
    public function parse($file);
}