<?php

require __DIR__ . '/vendor/autoload.php';

/*
$cat = new App\Cat\Cat;
echo $cat->speak();
$lion = new App\Cat\Lion;
echo $lion->speak();
*/

$cat = new App\Cat\Cat(
    new App\Cat\Actions\Speak\MeowAction,
    new App\Cat\Actions\Jump\JumpAction
);
//$cat->setSpeakAction(new App\Cat\Actions\Speak\GrowlAction);
echo $cat->speak();

$lion = new App\Cat\Cat(
    new App\Cat\Actions\Speak\GrowlAction,
    new App\Cat\Actions\Jump\JumpAction
);
echo $lion->speak();