<?php
declare(strict_types = 1);
namespace MichalM3;

class Zad3
{
    public const int MAX_COUNT = 100000; // ilosc elementow w tablicy

    public const int NUMBER_MIN = -10000; // minimalna wartosc elementu
    public const int NUMBER_MAX =  10000; // maxymalna wartosc elementu

    public const int SHIFT_MIN = 0;
    public const int SHIFT_MAX = PHP_INT_MAX;

    protected int $shift;

    protected ArrayCollection $data;

    public function __construct(ArrayCollection $data, mixed $shift)
    {
        $this->checkArray($data);
        $this->checkShift($shift);
        $this->data = $data;
        $this->shift = (int)$shift;
    }

    public static function checkShift(mixed $shift): bool
    {
        $validationOptions = [
            'options' => [
                'min_range' => self::SHIFT_MIN,
                'max_range' => self::SHIFT_MAX,
            ]
        ];

        if (!(filter_var($shift, FILTER_VALIDATE_INT, $validationOptions) !== false && !is_bool($shift))) {
            throw new \InvalidArgumentException("Wartość k musi być liczbą całkowitą większą lub równą 0 " . self::MAX_COUNT);
        }

        return true;
    }

    public static function checkArray(ArrayCollection $data): bool
    {
        if ($data->count() === 0 || $data->count() > self::MAX_COUNT) {
            throw new \InvalidArgumentException("Tablica musi mieć więcej niż 0 i mniej lub równe niż " . self::MAX_COUNT . " elementów");
        }

        $values = function () use ($data) {
            foreach ($data as $value) {
                yield $value;
            }
        };

        $validationOptions = [
            'options' => [
                'min_range' => self::NUMBER_MIN,
                'max_range' => self::NUMBER_MAX,
            ]
        ];

        foreach ($values() as $value) {
            // czy element jest liczbą całkowitą od... do...
            if (filter_var($value, FILTER_VALIDATE_INT, $validationOptions) !== false && !is_bool($value)) {
                continue;
            }

            throw new \InvalidArgumentException("Element tablicy musi być liczbą całkowitą nie mniejszą niż "
                . self::NUMBER_MIN . " i nie większą niż "
                . self::NUMBER_MAX);
        }

        return true;
    }

    public function result(ImplementationInterface $implementation): ArrayCollection
    {
        $implementation->run($this->data, $this->shift);

        return $implementation->getResult();
    }
}