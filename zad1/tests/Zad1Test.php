<?php
declare(strict_types=1);
namespace TestMichalM1;

use MichalM1\Algorithms\ArrayUnique;
use MichalM1\ArrayCollection;
use MichalM1\Zad1;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class Zad1Test extends TestCase
{
    use Zad1Suites;

    #[DataProvider('getIncorrectData')]
    public function testDataArrayIncorrect(ArrayCollection $elements)
    {
        $this->expectException(\InvalidArgumentException::class);
        Zad1::check($elements);
    }

    public function testBigDataArrayIncorrect()
    {
        $this->expectException(\InvalidArgumentException::class);
        Zad1::check($this->getBigArrayIncorect());
    }

    #[DataProvider('getCorrectData')]
    public function testDataArrayCorrect(ArrayCollection $elements) {
        try {
            $isOk = Zad1::check($elements);
            $this->assertSame($isOk, true);
        } catch (\InvalidArgumentException) {
            $this->fail();
        }
    }

    public function testBigDataArrayCorrect() {
        try {
            $isOk = Zad1::check($this->getBigArrayCorect());
            $this->assertSame($isOk, true);
        } catch (\InvalidArgumentException ) {
            $this->fail();
        }
    }

    #[DataProvider('getArrayWithResults')]
    public function testIntegrationResult(ArrayCollection $array, int $expected)
    {
        $zad = new Zad1($array);
        $algo = new ArrayUnique();

        $this->assertSame($zad->result($algo), $expected);
    }
}