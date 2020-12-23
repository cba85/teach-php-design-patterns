<?php

namespace App\Actions\Jump;

use App\Contracts\JumpActionInterface;

class JumpAction implements JumpActionInterface
{
    public function jump()
    {
        return 'Jump';
    }
}
