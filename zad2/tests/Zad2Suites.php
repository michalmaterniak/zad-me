<?php
declare(strict_types=1);
namespace TestMichalM2;

use MichalM2\ArrayCollection;

trait Zad2Suites
{
    public static function getCorrectData(): array
    {
        return [
            [new ArrayCollection([1, 2])],
            [new ArrayCollection([1, 1000000])],
            [new ArrayCollection(['1', 321])]
        ];
    }

    public static function getIncorrectData(): array
    {
        return [
            [new ArrayCollection([4, '0', 1, 2, 5, 3, '6'])],
            [new ArrayCollection(['asdf', 1, 2])],
            [new ArrayCollection(['', 1, -1000001])],
            [new ArrayCollection(['', 1, 1000001])],
            [new ArrayCollection([1, 2, 1000001])],
            [new ArrayCollection([1, 2, -1000001])],
            [new ArrayCollection([1, 2, -123])],
            [new ArrayCollection([1, 2, 0])],
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
        return new ArrayCollection(array_fill(0, 100001, 1));
    }

    public function getBigArrayCorect(): ArrayCollection
    {
        return new ArrayCollection(array_fill(0, 100000, 1));
    }

    public static function getArrayWithResults(): array
    {
        return [
            [new ArrayCollection([1, 2, 3]), true],
            [new ArrayCollection([1, 2, 3, 4, 5, 6, 7, 7]), false],
        ];
    }
}