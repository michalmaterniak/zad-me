wymagany PHP8.3.4:

```` docker compose up --build --no-start````

```` docker compose run php bash ````

w poszczegolnych zadaniach (folderach) znajduje się plik zad.php zawierający wymaganą funkcje fun()

```` php zad1/zad.php  ````

```` php zad2/zad.php  ````

```` php zad3/zad.php  ````

do uruchomienia zad.php nie jest wymagane uruchomienie ```composer update```

mimo to, warto ponieważ umożliwia to uruchomienie testów 

```` ./vendor/bin/phpunit -c zad1/phpunit.xml  ````

```` ./vendor/bin/phpunit -c zad2/phpunit.xml  ````

```` ./vendor/bin/phpunit -c zad3/phpunit.xml  ````

oraz benchmark

```` php zad1/benchmark.php  ````

```` php zad2/benchmark.php  ````

```` php zad3/benchmark.php  ````