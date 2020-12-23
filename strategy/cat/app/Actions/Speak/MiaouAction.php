<?php

namespace App\Actions\Speak;

use App\Contracts\SpeakActionInterface;

class MiaouAction implements SpeakActionInterface
{
    public function speak()
    {
        return "Miaouuuuuu";
    }
}
