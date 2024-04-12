<?php
declare(strict_types=1);
namespace MichalM1\Algorithms;

use MichalM1\ArrayCollection;
use MichalM1\ImplementationInterface;

/**
 * nieefektywny, dlugo sie wykonuje
 */
class ArrayKeysCounter implements ImplementationInterface
{
    protected array $keys;

    private function reset(): void
    {
        $this->keys = [];
    }

    public function run(ArrayCollection $data): void
    {
        $this->reset();

        $iterator = $data->getIterator();

        while ($iterator->valid())
        {
            $this->keys[$iterator->current()] = null;

            $iterator->next();
        }
    }

    public function getResult(): int
    {
        return count($this->keys);
    }
}