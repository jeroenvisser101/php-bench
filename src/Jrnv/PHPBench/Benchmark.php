<?php
namespace Jrnv\PHPBench;
use Jrnv\PHPBench\Contract\ResultPrinterInterface;

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
     * @param int|null $cycles Amount of cycles to run the benchmarks.
     */
    public function __construct($cycles = null)
    {
        $this->cycles = $cycles ?: $this->cycles;
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
     * @return array
     */
    public function run()
    {
        // Loop through all the benchmark's variants
        foreach ($this->variants as $variant) {
            $runtime = $this->runVariant($variant);

            // Add the result to the results array
            $this->results = [
                'name'    => $variant['name'],
                'runtime' => $runtime
            ];
        }

        return $this->results;
    }

    /**
     * Prints the results using the given resultPrinter
     * @param Contract\ResultPrinterInterface $resultPrinter The printer to use
     */
    public function printResults(ResultPrinterInterface $resultPrinter = null)
    {
        $resultPrinter = $resultPrinter ?: new TextPrinter;
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
