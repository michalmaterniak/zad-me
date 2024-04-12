<?php

namespace TestMichalM1\Algorithms;

use MichalM1\ArrayCollection;

trait AlgorithmSuits
{
    public static function getArrayWithResults(): array
    {
        return [
            [new ArrayCollection([1,2,3]), 3],
            [new ArrayCollection([2,2,2]), 1],
            [new ArrayCollection([2,2,2]), 1],
            [new ArrayCollection([2,'2',2]), 1],
            [new ArrayCollection([2,'2','2']), 1],
            [new ArrayCollection([2,'2','2', 4, "4"]), 2],
            [new ArrayCollection([1, '2', 3, '4']), 4],
        ];
    }

    public static function getBigArrayWithResults(): array
    {
        $rows = [];

        // milion elementow o wartości od -500000 do 5000000 (wynik milion)
        for($i = 0; $i < 1000000; $i++) {
            $data[] = $i - 500000;
        }

        $rows[] = [new ArrayCollection($data), 1000000];
        $rows[] = [new ArrayCollection(array_fill(-1000000, 1000000, 1)), 1];

        return $rows;
    }
}