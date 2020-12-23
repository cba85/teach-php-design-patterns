<?php

namespace App\Actions\Speak;

use App\Contracts\SpeakActionInterface;

class RoarAction implements SpeakActionInterface
{
    public function speak()
    {
        return "Rooooaaarrr";
    }
}
