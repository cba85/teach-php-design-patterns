<?php

namespace App\Actions\Jump;

use App\Contracts\JumpActionInterface;

class NoJumpAction implements JumpActionInterface
{
    public function jump()
    {
        return 'No jump';
    }
}
