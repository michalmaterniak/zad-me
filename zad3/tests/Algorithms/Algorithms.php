<?php

namespace TestMichalM3\Algorithms;

use MichalM3\ArrayCollection;
use MichalM3\ImplementationInterface;
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

    protected function results(ArrayCollection $elements, int $shift, ArrayCollection $excepted): void
    {
        $this->implementation->run($elements, $shift);
        $this->assertEquals((array)$this->implementation->getResult(), (array)$excepted);
    }
}