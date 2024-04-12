<?php
declare(strict_types=1);
namespace TestMichalM3;

use MichalM3\Algorithms\AlgoClassic;
use MichalM3\ArrayCollection;
use MichalM3\Zad3;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class Zad3Test extends TestCase
{
    use Zad3Suites;

    #[DataProvider('getIncorrectData')]
    public function testDataArrayIncorrect(ArrayCollection $elements): void
    {
        $this->expectException(\InvalidArgumentException::class);
        Zad3::checkArray($elements);
    }

    public function testBigDataArrayIncorrect(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        Zad3::checkArray($this->getBigArrayIncorect());
    }

    #[DataProvider('getCorrectData')]
    public function testDataArrayCorrect(ArrayCollection $elements): void
    {
        try {
            $isOk = Zad3::checkArray($elements);
            $this->assertSame($isOk, true);
        } catch (\InvalidArgumentException) {
            $this->fail();
        }
    }

    public function testBigDataArrayCorrect(): void
    {
        try {
            $isOk = Zad3::checkArray($this->getBigArrayCorect());
            $this->assertSame($isOk, true);
        } catch (\InvalidArgumentException ) {
            $this->fail();
        }
    }

    #[DataProvider('getCorrectKParameter')]
    public function testKParameterCorrect(mixed $shift): void
    {
        try {
            $isOk = Zad3::checkShift($shift);
            $this->assertSame($isOk, true);
        } catch (\InvalidArgumentException ) {
            $this->fail();
        }
    }

    #[DataProvider('getIncorrectKParameter')]
    public function testKParameterIncrrect(mixed $shift): void
    {
        $this->expectException(\InvalidArgumentException::class);
        Zad3::checkShift($shift);
    }
    
    #[DataProvider('getArrayWithResults')]
    public function testIntegrationResult(ArrayCollection $array, int $k, array $expected): void
    {
        $zad = new Zad3($array, $k);
        $algo = new AlgoClassic();

//        dump((array)$zad->result($algo));
//        dump($expected);
//
//        die;

        $this->assertEquals((array)$zad->result($algo), $expected);
    }
}