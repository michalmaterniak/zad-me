<?php

namespace MichalM3\Algorithms;

use MichalM3\ArrayCollection;
use MichalM3\ImplementationInterface;

class AlgoClassic implements ImplementationInterface
{
    protected int $shift;

    protected ArrayCollection $result;

    public function run(ArrayCollection $data, int $shift): void
    {
        $this->shift = $shift % $data->count();

        if ($this->shift === 0) {
            $this->result = $data;

            return;
        }

        $chunked = array_chunk((array)$data, $this->shift);
        $chunked[] = array_shift($chunked);

        $this->result = new ArrayCollection(array_merge(...$chunked));
    }

    public function getResult(): ArrayCollection
    {
        return $this->result;
    }
}