<?php

namespace App\Cat\Actions\Jump;

use App\Cat\Contracts\JumpActionInterface;

class JumpAction implements JumpActionInterface
{
    public function jump()
    {
        return "Jump!";
    }
}