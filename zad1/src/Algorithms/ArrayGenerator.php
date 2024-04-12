<?php
declare(strict_types=1);
namespace MichalM1\Algorithms;

use MichalM1\ArrayCollection;
use MichalM1\ImplementationInterface;

/**
 * nieefektywny, dlugo sie wykonuje
 */
class ArrayGenerator implements ImplementationInterface
{
    protected array $keys;

    private function reset(): void
    {
        $this->keys = [];
    }

    public function run(ArrayCollection $data): void
    {
        $this->reset();

        foreach (self::getData($data) as $value) {
            $this->keys[$value] = null;
        }
    }

    private static function getData(ArrayCollection $data): \Generator
    {
        foreach ($data as $item) {
            yield $item;
        }
    }

    public function getResult(): int
    {
        return count($this->keys);
    }
}