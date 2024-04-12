<?php

namespace TestMichalM1\Algorithms;

use MichalM1\Algorithms\ArrayGenerator;
use MichalM1\ArrayCollection;
use PHPUnit\Framework\Attributes\DataProvider;

class ArrayGeneratorTest extends Algorithms
{
    protected function setImplementation(): void
    {
        $this->implementation = new ArrayGenerator();
    }

    #[DataProvider('getArrayWithResults')]
    public function testResultsArrayGenerator(ArrayCollection $elements, int $expected): void
    {
        $this->results($elements, $expected);
    }

    public function testResultsBigArrayGenerator(): void
    {
        foreach ($this->getBigArrayWithResults() as $test) {
            list ($array, $expected) = $test;
            $this->results($array, $expected);
        }
    }
}
