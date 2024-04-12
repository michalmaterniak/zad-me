<?php
spl_autoload_register(function ($class) {
    $namespace = 'MichalM2\\';
    $class = str_replace($namespace, '', $class);
    $class = str_replace('\\', '/', $class);
    $class = 'src/' . $class . '.php';
    require $class;
});

function fun(array $A): bool
{
    try {
        $zad2 = new \MichalM2\Zad2(new \MichalM2\ArrayCollection($A));
    } catch (InvalidArgumentException $ex) {
        echo "nieprawidlowe dane wejściowe";

        throw $ex;
    }

    return $zad2->result(new \MichalM2\Algorithms\AlgoClassic());
}

print_r([(int)fun([1, 1, 2, 3]), (int)fun([1, 2, 3])]); // 0, 1
