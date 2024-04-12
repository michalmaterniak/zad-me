<?php
declare(strict_types=1);
namespace TestMichalM2;

use MichalM2\Algorithms\AlgoClassic;
use MichalM2\ArrayCollection;
use MichalM2\Zad2;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class Zad2Test extends TestCase
{
    use Zad2Suites;

    #[DataProvider('getIncorrectData')]
    public function testDataArrayIncorrect(ArrayCollection $elements)
    {
        $this->expectException(\InvalidArgumentException::class);
        Zad2::check($elements);
    }

    public function testBigDataArrayIncorrect()
    {
        $this->expectException(\InvalidArgumentException::class);
        Zad2::check($this->getBigArrayIncorect());
    }

    #[DataProvider('getCorrectData')]
    public function testDataArrayCorrect(ArrayCollection $elements) {
        try {
            $isOk = Zad2::check($elements);
            $this->assertSame($isOk, true);
        } catch (\InvalidArgumentException) {
            $this->fail();
        }
    }

    public function testBigDataArrayCorrect() {
        try {
            $isOk = Zad2::check($this->getBigArrayCorect());
            $this->assertSame($isOk, true);
        } catch (\InvalidArgumentException ) {
            $this->fail();
        }
    }

    #[DataProvider('getArrayWithResults')]
    public function testIntegrationResult(ArrayCollection $array, bool $expected)
    {
        $zad = new Zad2($array);
        $algo = new AlgoClassic();

        $this->assertSame($zad->result($algo), $expected);
    }
}