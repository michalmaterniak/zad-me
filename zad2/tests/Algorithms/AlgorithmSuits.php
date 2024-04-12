<?php

namespace TestMichalM2\Algorithms;

use MichalM2\ArrayCollection;

trait AlgorithmSuits
{
    public static function getArrayWithResults(): array
    {
        return [
            [new ArrayCollection([1,2,3]), true],
            [new ArrayCollection([2,1,3]), true],
            [new ArrayCollection([2,2,2]), false],
            [new ArrayCollection([1, '2', 3, 4, 5, 6, '7']), true],
            [new ArrayCollection([4, '7', 1, 2, 5, 3, '6']), true],
            [new ArrayCollection([4, '1', 1, 2, 5, 3, '6']), false],
            [new ArrayCollection([2,'2','2']), false]
        ];
    }

    public static function getBigArrayWithResults(): array
    {
        $rows = [];

        // milion elementow o wartości od 1 do 1000000 (wynik true)
        for($i = 0; $i < 1000000; $i++) {
            $data[] = $i + 1;
        }

        $rows[] = [new ArrayCollection($data), true];
        $rows[] = [new ArrayCollection(array_fill(0, 10000, 1)), false];

        return $rows;
    }
}