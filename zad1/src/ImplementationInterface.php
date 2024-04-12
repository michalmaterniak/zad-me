<?php
declare(strict_types=1);
namespace MichalM1;

use MichalM1\Algorithms\ArrayBuckets;
use MichalM1\Algorithms\ArrayGenerator;
use MichalM1\Algorithms\ArrayKeysCounter;
use MichalM1\Algorithms\ArrayUnique;
use MichalM1\Algorithms\ArrayValuesAsKey;

interface ImplementationInterface
{
    public const array AVAILABLE_IMPLEMENTATIONS = [
        ArrayUnique::class,
        ArrayBuckets::class,
        ArrayGenerator::class,
        ArrayKeysCounter::class,
        ArrayValuesAsKey::class
    ];

    public function getResult(): mixed;

    public function run(ArrayCollection $data);
}