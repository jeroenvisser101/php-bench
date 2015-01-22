<?php
namespace Jrnv\PHPBench;
use Jrnv\PHPBench\Contract\ResultPrinterInterface;
use Jrnv\PHPBench\Printer\TextPrinter;

/**
 * Benchmark
 *
 * @author Jeroen Visser <jeroenvisser101@gmail.com>
 */
class Benchmark
{
    private $cycles = 1000000;
    private $variants = [];
    private $results = [];

    /**
     * Class constructor.
     *
     * @param int|null                        $cycles        Amount of cycles to run the benchmarks.
     * @param Contract\ResultPrinterInterface $resultPrinter The printer to print the results
     */
    public function __construct($cycles = null, ResultPrinterInterface $resultPrinter = null)
    {
        $this->cycles = $cycles ?: $this->cycles;
        $this->resultPrinter = $resultPrinter ?: new TextPrinter();
    }

    /**
     * Add a variant to the current benchmark.
     *
     * @param string   $name The name of this variant
     * @param callable $fn   Function to test
     */
    public function addVariant($name, callable $fn)
    {
        $this->variants[] = [
            'name' => $name,
            'fn'   => $fn
        ];
    }

    /**
     * Runs the benchmark, returns results.
     *
     * @param bool $print Indicates wether this function should also print the results
     *
     * @return array
     */
    public function run($print = true)
    {
        // Loop through all the benchmark's variants
        foreach ($this->variants as $variant) {
            $runtime = $this->runVariant($variant);

            // Add the result to the results array
            $this->results[] = [
                'name'    => $variant['name'],
                'runtime' => $runtime
            ];
        }

        $this->printResults();

        return $this->results;
    }

    /**
     * Prints the results using the given resultPrinter
     */
    protected function printResults()
    {
        $this->resultPrinter->printResults($this->results);
    }

    /**
     * Returns runtime in milliseconds.
     *
     * @param array $variant Array containing the variant's function.
     *
     * @return float
     */
    private function runVariant(array $variant)
    {
        $start = microtime(true);

        for ($i = $this->cycles; $i >= 0; --$i) {
            $variant['fn']();
        }

        return (microtime(true) - $start) * 1000;
    }
}
