<?php

namespace App;

class Lion extends Feline
{
    /*
    public function speak()
    {
        return "Roooaaaar";
    }

    public function jump()
    {
        return 'Jump';
    }
    */

    public function speak()
    {
        return $this->speakAction->speak();
    }

    public function jump()
    {
        return $this->jumpAction->jump();
    }
}
