<?php
declare(strict_types=1);
namespace TestMichalM1\Algorithms;

use MichalM1\Algorithms\ArrayBuckets;
use MichalM1\ArrayCollection;
use PHPUnit\Framework\Attributes\DataProvider;

class ArrayBacketsTest extends Algorithms
{
    protected function setImplementation(): void
    {
        $this->implementation = new ArrayBuckets();
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