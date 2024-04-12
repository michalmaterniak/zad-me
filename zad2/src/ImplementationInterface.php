<?php
declare(strict_types=1);
namespace MichalM2;

use MichalM2\Algorithms\AlgoClassic;
use MichalM2\Algorithms\AlgoFast;

interface ImplementationInterface
{
    public const array AVAILABLE_IMPLEMENTATIONS = [
        AlgoClassic::class,
        AlgoFast::class
    ];

    public function getResult(): mixed;

    public function run(ArrayCollection $data);
}