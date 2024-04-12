<?php

namespace TestMichalM2\Algorithms;

use MichalM2\Algorithms\AlgoClassic;

class AlgoClassicTest extends Algorithms
{
    protected function setImplementation(): void
    {
        $this->implementation = new AlgoClassic();
    }
}
