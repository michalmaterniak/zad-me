<?php
declare(strict_types = 1);
namespace MichalM2;

class Zad2
{
    public const int MAX_COUNT = 100000; // ilosc elementow w tablicy

    public const int NUMBER_MIN = 1; // minimalna wartosc elementu
    public const int NUMBER_MAX = 1000000; // maxymalna wartosc elementu

    protected ArrayCollection $data;

    public function __construct(ArrayCollection $data)
    {
        $this->check($data);
        $this->data = $data;
    }

    public static function check(ArrayCollection $data): bool
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

    public function result(ImplementationInterface $implementation): bool
    {
        $implementation->run($this->data);

        return $implementation->getResult();
    }
}