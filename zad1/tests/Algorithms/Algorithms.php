<?php

namespace TestMichalM1\Algorithms;

use MichalM1\ArrayCollection;
use MichalM1\ImplementationInterface;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

abstract class Algorithms extends TestCase
{
    use AlgorithmSuits;

    protected ImplementationInterface $implementation;

    protected function setUp(): void
    {
        $this->setImplementation();
    }

    abstract protected function setImplementation(): void;

    protected function results(ArrayCollection $elements, int $expected): void
    {
        $this->implementation->run($elements);
        $this->assertEquals($this->implementation->getResult(), $expected);
    }
}