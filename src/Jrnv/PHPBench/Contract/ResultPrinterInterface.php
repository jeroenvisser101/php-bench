<?php
namespace Jrnv\PHPBench\Contract;

/**
 * ResultPrinterInterface
 *
 * @author Jeroen Visser <jeroenvisser101@gmail.com>
 */
interface ResultPrinterInterface
{
    /**
     * Prints the given results
     *
     * @param array $results
     *
     * @return string
     */
    public function printResults(array $results);
}
