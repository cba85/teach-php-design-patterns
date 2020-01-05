<?php

namespace App\Cat\Actions\Speak;

use App\Cat\Contracts\SpeakActionInterface;

class GrowlAction implements SpeakActionInterface
{
    public function speak()
    {
        return "Grooowwll!";
    }
}