<?php
declare(strict_types=1);
namespace MichalM1\Algorithms;

use MichalM1\ArrayCollection;
use MichalM1\ImplementationInterface;

/**
 * najszybszy z pozostałych
 */
class ArrayValuesAsKey implements ImplementationInterface
{
    protected int $count = 0;

    public function run(ArrayCollection $data): void
    {
        $this->count = count(array_fill_keys((array)$data, true));
    }

    public function getResult(): int
    {
        return $this->count;
    }

}