<?php

namespace MichalM2\Algorithms;

use MichalM2\ImplementationInterface;
use MichalM2\ArrayCollection;

class AlgoClassic implements ImplementationInterface
{
    protected bool $result;

    public function run(ArrayCollection $data): void
    {
        $count = $data->count();
        $countUnique = count(array_unique((array)$data));

        $this->result = $count === $countUnique;
    }

    public function getResult(): bool
    {
        return $this->result;
    }
}