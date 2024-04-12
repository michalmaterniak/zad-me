<?php

namespace TestMichalM3\Algorithms;

use MichalM3\Algorithms\AlgoSplit;
use MichalM3\ArrayCollection;
use PHPUnit\Framework\Attributes\DataProvider;

class AlgoSplitTest extends Algorithms
{
    protected function setImplementation(): void
    {
        $this->implementation = new AlgoSplit();
    }

    #[DataProvider('getArrayWithResults')]
    public function testResultsAlgoSplit(ArrayCollection $elements, int $shift, ArrayCollection $excepted): void
    {
        $this->results($elements, $shift, $excepted);
    }

    public function testResultsBigAlgoSplit(): void
    {
        foreach ($this->getBigArrayWithResults() as $test) {
            list ($array, $shift, $expected) = $test;
            $this->results($array, $shift, $expected);
        }
    }
}
