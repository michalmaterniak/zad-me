<?php
declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';

use MichalM3\ArrayCollection;
use MichalM3\Zad3;

function fun(array $A, mixed $k): array
{
    try {
        $Zad3 = new Zad3(new ArrayCollection($A), $k);
    } catch (InvalidArgumentException $ex) {
        echo "nieprawidlowe dane wejściowe";

        throw $ex;
    }

    return (array)$Zad3->result(new \MichalM3\Algorithms\AlgoShifts());
}
dump(fun([1, 2, 3, 4, 5, 6, 5, 5, 5, '5', 4], 4));
//dump([5, 6, 5, 5, 5, 5, 4, 1, 2, 3, 4]);