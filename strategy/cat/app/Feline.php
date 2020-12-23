<?php

namespace App;

use App\Contracts\JumpActionInterface;
use App\Contracts\SpeakActionInterface;

class Feline
{
    protected $speakAction;
    protected $jumpAction;

    public function __construct(SpeakActionInterface $speakAction, JumpActionInterface $jumpAction)
    {
        $this->speakAction = $speakAction;
        $this->jumpAction = $jumpAction;
    }
}
