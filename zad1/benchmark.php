<?php
declare(strict_types=1);
ini_set('memory_limit', '-1');

require __DIR__ . '/../vendor/autoload.php';
class Benchmark {
    private string $startTime;
    private string $stopTime;

    protected function start(): void
    {
        $this->startTime = (string)microtime(true);
    }

    protected function stop(): void
    {
        $this->stopTime = (string)microtime(true);
    }

    public function getResult(bool $miliseconds = false): array
    {
        if (!$miliseconds) {
            return [
                'time' => bcsub($this->stopTime, $this->startTime, 16),
            ];
        }

        return [
            'time' => bcmul(bcsub($this->stopTime, $this->startTime, 16), '1000', 4),
        ];
    }
}

class SuitesBenchmark extends Benchmark {
    use \TestMichalM1\Algorithms\AlgorithmSuits;

    public static $scripts = \MichalM1\ImplementationInterface::AVAILABLE_IMPLEMENTATIONS;

    public static $repets = 10;

    public function startBenchmark(\MichalM1\ImplementationInterface $implementation): void
    {
        $suites = [
            ...$this->getBigArrayWithResults(),
            ...$this->getBigArrayWithResults(),
            ...$this->getBigArrayWithResults(),
            ...$this->getBigArrayWithResults()
        ];
        $this->start();

        foreach($suites as $suite) {
            $implementation->run($suite[0]);
        }

        $this->stop();
    }
}

$table = new \jc21\CliTable();
$table->setTableColor('blue');
$table->setHeaderColor('cyan');
$data = [];

$scripts = SuitesBenchmark::$scripts;
$averages = [];

foreach (['time' => 'Czas'] as $key => $name) {
    foreach ($scripts as $algorithm) {
        $algorithm = array_reverse(explode('\\', $algorithm));
        $algorithm = $algorithm[0];

        $table->addField($algorithm . ' ' . $name,  $algorithm . $key);
        $averages[$algorithm . $key] = '0';
    }
}

$results = [];

for($i = 0; $i < SuitesBenchmark::$repets; $i++) {
    $row = [];

    foreach ($scripts as $algorithm) {
        $benchmark = new SuitesBenchmark();

        $benchmark->startBenchmark(new $algorithm());
        $result = $benchmark->getResult(true);
        unset($benchmark);
        $algorithm = array_reverse(explode('\\', $algorithm));

        $algorithm = $algorithm[0];

        foreach (['time'] as $key) {
            $row[$algorithm . $key] = $result[$key];
            $averages[$algorithm . $key] = bcadd($averages[$algorithm . $key], (string)$row[$algorithm . $key]);
        }
    }
    $results[] = $row;
}
foreach (array_keys($averages) as $value) {
    $averages[$value] = 'avg: ' . (float)bcdiv($averages[$value], (string)SuitesBenchmark::$repets, 4);
}

$results[] = $averages;
$table->injectData($results);
$table->display();
