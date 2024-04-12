<?php
declare(strict_types=1);
namespace TestMichalM3;

use MichalM3\ArrayCollection;

trait Zad3Suites
{
    public static function getCorrectData(): array
    {
        return [
            [new ArrayCollection([1, 2])],
            [new ArrayCollection([1, 10000])],
            [new ArrayCollection(['1', 321])],
            [new ArrayCollection([1, 2, 1000])],
            [new ArrayCollection([1, 2, -1000])],
            [new ArrayCollection([1, 2, '-1000'])],
            [new ArrayCollection([1, 2, '1000'])],
        ];
    }

    public static function getIncorrectData(): array
    {
        return [
            [new ArrayCollection(['asdf', 1, 2])],
            [new ArrayCollection(['', 1, -10001])],
            [new ArrayCollection(['', 1, 1000001])],
            [new ArrayCollection([1, 2, 10001])],
            [new ArrayCollection([1, 2, -10001])],
            [new ArrayCollection([1, 2, '-10001'])],
            [new ArrayCollection([1, 2, '10001'])],
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
        return new ArrayCollection(array_fill(0, 100001, 1));
    }

    public function getBigArrayCorect(): ArrayCollection
    {
        return new ArrayCollection(array_fill(0, 100000, 1));
    }

    public static function getArrayWithResults(): array
    {
        return [
//            [new ArrayCollection([1, 2, 3, 4, 5, 6, 5, 5, 5, '5', 4]), 4, [5, 6, 5, 5, 5, '5', 4, 1, 2, 3, 4]],
            [new ArrayCollection([1, 2, 3, 4, 5, 6, 5, 5, 5, '5', 4]), 65, [4, 1, 2, 3, 4, 5, 6, 5, 5, 5, '5']],
        ];
    }

    public static function getCorrectKParameter(): array
    {
        return [
            [0],
            [987],
            [6546],
            [2243],
            [PHP_INT_MAX]
        ];
    }

    public static function getIncorrectKParameter(): array
    {
        return [
            [-1],
            [-123],
            ['-1200003'],
            ["12G332"],
            [new \DateTime()],
            [true],
            [false],
            [[12]],
            [null],
            ['dupa8'],
            [bcadd((string)PHP_INT_MAX, '100')],
        ];
    }
}