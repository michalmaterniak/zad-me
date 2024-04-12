<?php

namespace TestMichalM3\Algorithms;

use MichalM3\ArrayCollection;

trait AlgorithmSuits
{
    public static function getArrayWithResults(): array
    {
        return [
            [new ArrayCollection([1, 2, 3, 4, 5, 6, 5, 5, 5, '5', 4]), 4, new ArrayCollection([5, 6, 5, 5, 5, 5, 4, 1, 2, 3, 4])],
            [new ArrayCollection([1, 2, 3, 4]), 4, new ArrayCollection([1, 2, 3, 4])],
            [new ArrayCollection([1, 2, 3, 4]), 5, new ArrayCollection([2, 3, 4, 1])],
            [new ArrayCollection([1, 2, 3, 4, 5, 6, 5, 5, 5, '5', 4]), 65478985, new ArrayCollection([1, 2, 3, 4, 5, 6, 5, 5, 5, 5, 4])],
            [new ArrayCollection([1, 2, 3, 4, 5, 6, 5, 5, 5, '5', 4]), 1233, new ArrayCollection([2, 3, 4, 5, 6, 5, 5, 5, '5', 4, 1])],
            [new ArrayCollection([1, 2, 3, 3, 4, 5, 6, 7, 2, 1, 9, 10]), 11, new ArrayCollection([10, 1, 2, 3, 3, 4, 5, 6, 7, 2, 1, 9])],
        ];
    }

    protected static function generateBigRecord(int $k): array
    {
        $row = new ArrayCollection();
        $expected = new ArrayCollection();

        for($i = 0; $i < 100000; $i++) {
            $row->append($i);
        }

        for($i = $k; $i < 100000; $i++) {
            $expected->append($i);
        }

        for($i = 0; $i < $k; $i++) {
            $expected->append($i);
        }

        return [$row, $k, $expected];
    }

    public static function getBigArrayWithResults(): array
    {
        $data = [];

        foreach ([1, 10, 155, 53453, 99999, 90000] as $k) {
            $data[] = self::generateBigRecord($k);
        }

        return $data;
    }
}