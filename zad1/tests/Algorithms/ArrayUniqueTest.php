<?php
declare(strict_types=1);
namespace TestMichalM1\Algorithms;

use MichalM1\Algorithms\ArrayUnique;
use MichalM1\ArrayCollection;
use PHPUnit\Framework\Attributes\DataProvider;

class ArrayUniqueTest extends Algorithms
{
    use AlgorithmSuits;

    protected function setImplementation(): void
    {
        $this->implementation = new ArrayUnique();
    }

    #[DataProvider('getArrayWithResults')]
    public function testResultsArrayUnique(ArrayCollection $elements, int $expected): void
    {
        $this->results($elements, $expected);
    }

    public function testResultsBigArrayUnique(): void
    {
        foreach ($this->getBigArrayWithResults() as $test) {
            list ($array, $expected) = $test;

            $this->results($array, $expected);
        }
    }
}