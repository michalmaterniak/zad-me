<?php

namespace TestMichalM2\Algorithms;

use MichalM2\Algorithms\AlgoFast;

class AlgoFastTest extends Algorithms
{
    protected function setImplementation(): void
    {
        $this->implementation = new AlgoFast();
    }
}
