<?php
declare(strict_types=1);
namespace TestMichalM1;

use MichalM1\ArrayCollection;

trait Zad1Suites
{
    public static function getCorrectData(): array
    {
        return [
            [new ArrayCollection([-1, 0, 1, 2])],
            [new ArrayCollection([0, 1, -1000000])],
            [new ArrayCollection(['-1', 1, -1000000])],
            [new ArrayCollection(['-1', 1, '-1000000'])],
            [new ArrayCollection(['-1', 1, 1000000])],
        ];
    }

    public static function getIncorrectData(): array
    {
        return [
            [new ArrayCollection(['asdf', 1, 2])],
            [new ArrayCollection(['', 1, -1000001])],
            [new ArrayCollection(['', 1, 1000001])],
            [new ArrayCollection([1, 2, 1000001])],
            [new ArrayCollection([1, 2, -1000001])],
            [new ArrayCollection([-123, 1, new \DateTime()])],
            [new ArrayCollection([0, 1, []])],
            [new ArrayCollection([0, 1, null])],
            [new ArrayCollection([0, 1, false])],
            [new ArrayCollection([0, 1, true])],
            [new ArrayCollection([])],
        ];
    }

    public function getBigArrayIncorect(): ArrayCollection
    {
        return new ArrayCollection(array_fill(0, 1000001, 1));
    }

    public function getBigArrayCorect(): ArrayCollection
    {
        return new ArrayCollection(array_fill(0, 1000000, 1));
    }

    public static function getArrayWithResults(): array
    {
        return [
            [new ArrayCollection([-1, 0, 1, 2, 2]), 4],
        ];
    }
}