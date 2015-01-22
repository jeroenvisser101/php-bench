<?php
namespace Jrnv\PHPBench\Printer;

use Jrnv\PHPBench\Contract\ResultPrinterInterface;

/**
 * TestPrinter
 *
 * @author Jeroen Visser <jeroenvisser101@gmail.com>
 */
class TextPrinter implements ResultPrinterInterface
{

    /**
     * Prints the given results
     *
     * @param array $results
     *
     * @return string
     */
    public function printResults(array $results)
    {
        $return = '';

        foreach ($results as $result) {
            $return .= $this->printResult($result);
        }

        return $return;
    }

    /**
     * Prints a single result
     *
     * @param array $result The result array to use
     *
     * @return string
     */
    private function printResult(array $result)
    {
        // Do markup on items
        $name = $result['name'];
        $runtime = round($result['runtime'], 2) . 'ms';

        echo sprintf(
            "| %s | %s |\n",
            str_pad($name, 20, ' '),
            str_pad($runtime, 15, ' ')
        );
    }
}
