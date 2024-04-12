<?php
declare(strict_types=1);
namespace MichalM1\Algorithms;

use MichalM1\ArrayCollection;
use MichalM1\ImplementationInterface;

/**
 * taki sobie, troszke bardziej skomplikowany
 */
class ArrayBuckets implements ImplementationInterface
{
    protected int $count;

    private function reset(): void
    {
        $this->count = 0;
    }

    public function run(ArrayCollection $data): void
    {
        $this->reset();
        $buckets = [];

        foreach ($data as $value) {
            if (!($buckets[$value] ?? false)) {
                $buckets[$value] = true;
                $this->count++;
            }
        }
    }

    public function getResult(): int
    {
        return $this->count;
    }
}