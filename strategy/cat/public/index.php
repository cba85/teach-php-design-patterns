<?php

use App\Actions\Jump\JumpAction;
use App\Actions\Jump\NoJumpAction;
use App\Actions\Speak\MiaouAction;
use App\Actions\Speak\RoarAction;
use App\Cat;
use App\Lion;

require __DIR__ . "/../vendor/autoload.php";

/*
$cat = new App\Cat;
echo $cat->speak();
echo $cat->jump(); // Handicapé car il est passé sous le skate de Samuel

$lion = new App\Lion;
echo $lion->speak();
echo $lion->jump();
*/

$cat = new Cat(new MiaouAction, new NoJumpAction);
echo $cat->speak();
echo $cat->jump();

$lion = new Lion(new RoarAction, new JumpAction);
echo $lion->speak();
echo $lion->jump();
