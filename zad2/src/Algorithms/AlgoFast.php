<?php

namespace MichalM2\Algorithms;

use MichalM2\ImplementationInterface;
use MichalM2\ArrayCollection;

class AlgoFast implements ImplementationInterface
{
    protected bool $result;

    public function run(ArrayCollection $data): void
    {
        $this->result = $data->count() === count(array_fill_keys((array)$data, true));
    }

    public function getResult(): bool
    {
        return $this->result;
    }
}