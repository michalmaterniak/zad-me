<?php
declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';

use MichalM2\ArrayCollection;
use MichalM2\Zad2;

function fun(array $A): bool
{
    try {
        $zad2 = new Zad2(new ArrayCollection($A));
    } catch (InvalidArgumentException $ex) {
        echo "nieprawidlowe dane wejściowe";

        throw $ex;
    }

    return $zad2->result(new \MichalM2\Algorithms\AlgoClassic());
}

dump(fun([1, 2, 3, 3]));