<?php
spl_autoload_register(function ($class) {
    $namespace = 'MichalM3\\';
    $class = str_replace($namespace, '', $class);
    $class = str_replace('\\', '/', $class);
    $class = 'src/' . $class . '.php';
    require $class;
});

function fun(array $A, mixed $k): array
{
    try {
        $zad3 = new \MichalM3\Zad3(new \MichalM3\ArrayCollection($A), $k);
    } catch (InvalidArgumentException $ex) {
        echo "nieprawidlowe dane wejściowe";

        throw $ex;
    }

    return (array)$zad3->result(new \MichalM3\Algorithms\AlgoSplit());
}

print_r(fun([1, 2, 3, 4, 5, 6, 7], 2)); // 3, 4, 5, 6, 7, 1, 2