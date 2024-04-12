<?php
declare(strict_types=1);
namespace MichalM1\Algorithms;

use MichalM1\ArrayCollection;
use MichalM1\ImplementationInterface;

/**
 * optymalny, prosty do zrozumienia i wykonania, ale nie najszybszy
 */
class ArrayUnique implements ImplementationInterface
{
    protected int $count = 0;

    public function run(ArrayCollection $data): void
    {
        $this->count = count(array_unique((array)$data));
    }

    public function getResult(): int
    {
        return $this->count;
    }

}