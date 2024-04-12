<?php
spl_autoload_register(function ($class) {
    $namespace = 'MichalM3\\';
    $class = str_replace($namespace, '', $class);
    $class = str_replace('\\', '/', $class);
    $class = 'src/' . $class . '.php';
    require $class;
});