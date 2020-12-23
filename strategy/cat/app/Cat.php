<?php

namespace App;

class Cat extends Feline
{
    /*
    public function speak()
    {
        return "Miaou";
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
