<?php

namespace TestMichalM3\Algorithms;

use MichalM3\Algorithms\AlgoClassic;
use MichalM3\ArrayCollection;
use PHPUnit\Framework\Attributes\DataProvider;

class AlgoClassicTest extends Algorithms
{
    protected function setImplementation(): void
    {
        $this->implementation = new AlgoClassic();
    }

    #[DataProvider('getArrayWithResults')]
    public function testResultsAlgoClassic(ArrayCollection $elements, int $shift, ArrayCollection $excepted): void
    {
        $this->results($elements, $shift, $excepted);
    }

    public function testResultsBigAlgoClassic(): void
    {
        foreach ($this->getBigArrayWithResults() as $test) {
            list ($array, $shift, $expected) = $test;
            $this->results($array, $shift, $expected);
        }
    }
}
