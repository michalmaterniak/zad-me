<?php

namespace TestMichalM1\Algorithms;

use MichalM1\Algorithms\ArrayValuesAsKey;
use MichalM1\ArrayCollection;
use PHPUnit\Framework\Attributes\DataProvider;

class ArrayValuesAsKeyTest extends Algorithms
{
    protected function setImplementation(): void
    {
        $this->implementation = new ArrayValuesAsKey();
    }

    #[DataProvider('getArrayWithResults')]
    public function testResultsArrayValuesAsKeys(ArrayCollection $elements, int $expected): void
    {
        $this->results($elements, $expected);
    }

    public function testResultsBigArrayValuesAsKeys(): void
    {
        foreach ($this->getBigArrayWithResults() as $test) {
            list ($array, $expected) = $test;
            $this->results($array, $expected);
        }
    }
}
