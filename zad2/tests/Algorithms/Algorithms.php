<?php

namespace TestMichalM2\Algorithms;

use MichalM2\ArrayCollection;
use MichalM2\ImplementationInterface;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

abstract class Algorithms extends TestCase
{
    use AlgorithmSuits;

    protected ImplementationInterface $implementation;

    abstract protected function setImplementation(): void;

    protected function setUp(): void
    {
        $this->setImplementation();
    }

    protected function results(ArrayCollection $elements, bool $expected): void
    {
        $this->implementation->run($elements);
        $this->assertEquals($this->implementation->getResult(), $expected);
    }

    #[DataProvider('getArrayWithResults')]
    public function testResults(ArrayCollection $elements, bool $expected): void
    {
        $this->results($elements, $expected);
    }

    public function testResultsBig(): void
    {
        foreach ($this->getBigArrayWithResults() as $test) {
            list ($array, $expected) = $test;
            $this->results($array, $expected);
        }
    }
}