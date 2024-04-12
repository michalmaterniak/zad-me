<?php

namespace MichalM3\Algorithms;

use MichalM3\ArrayCollection;
use MichalM3\ImplementationInterface;

class AlgoSplit implements ImplementationInterface
{
    protected ArrayCollection $result;

    protected ArrayCollection $data;

    public function run(ArrayCollection $data, int $shift): void
    {
        $this->data = $data;
        $data = $data->getArrayCopy();
        $part1 = array_splice($data, $shift % $this->data->count());
        $this->result = new ArrayCollection([...$part1, ...$data]);
    }

    public function getResult(): ArrayCollection
    {
        return $this->result;
    }
}