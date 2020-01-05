<?php

namespace App\Cat\Actions\Speak;

use App\Cat\Contracts\SpeakActionInterface;

class MeowAction implements SpeakActionInterface
{
    public function speak()
    {
        return "Meow";
    }
}