<?php
declare(strict_types=1);
namespace MichalM3;

use MichalM3\Algorithms\AlgoClassic;
use MichalM3\Algorithms\AlgoSplit;


interface ImplementationInterface
{
    public const array AVAILABLE_IMPLEMENTATIONS = [
        AlgoClassic::class,
        AlgoSplit::class,
    ];

    public function getResult(): mixed;

    public function run(ArrayCollection $data, int $shift);
}