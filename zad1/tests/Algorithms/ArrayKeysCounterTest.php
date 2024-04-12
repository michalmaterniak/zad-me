<?php

namespace TestMichalM1\Algorithms;

use MichalM1\Algorithms\ArrayKeysCounter;
use MichalM1\ArrayCollection;
use PHPUnit\Framework\Attributes\DataProvider;

class ArrayKeysCounterTest extends Algorithms
{
    protected function setImplementation(): void
    {
        $this->implementation = new ArrayKeysCounter();
    }

    #[DataProvider('getArrayWithResults')]
    public function testResultsArrayBuckets(ArrayCollection $elements, int $expected): void
    {
        $this->results($elements, $expected);
    }

    public function testResultsBigArrayBuckets(): void
    {
        foreach ($this->getBigArrayWithResults() as $test) {
            list ($array, $expected) = $test;
            $this->results($array, $expected);
        }
    }
}
