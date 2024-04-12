<?php
declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';

use MichalM1\ArrayCollection;
use MichalM1\Zad1;

function fun(array $A): int
{
    try {
        $zad1 = new Zad1(new ArrayCollection($A));
    } catch (InvalidArgumentException $ex) {
        echo "nieprawidlowe dane wejściowe";

        throw $ex;
    }

    return $zad1->result(new \MichalM1\Algorithms\ArrayBuckets());
}

dump(fun(['0', 1, 2, 2, 1, 0, 5, -1000000]));