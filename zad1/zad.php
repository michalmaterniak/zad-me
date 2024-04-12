<?php
spl_autoload_register(function ($class) {
    $namespace = 'MichalM1\\';
    $class = str_replace($namespace, '', $class);
    $class = str_replace('\\', '/', $class);
    $class = 'src/' . $class . '.php';
    require $class;
});

function fun(array $A): int
{
    try {
        $zad1 = new \MichalM1\Zad1(new \MichalM1\ArrayCollection($A));
    } catch (InvalidArgumentException $ex) {
        echo "nieprawidlowe dane wejściowe";

        throw $ex;
    }

    return $zad1->result(new \MichalM1\Algorithms\ArrayValuesAsKey());
}

print_r([fun([1,2, 2, 2, 3, 4, 5, 6, 6])]); // 6
