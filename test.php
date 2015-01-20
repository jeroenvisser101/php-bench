<?php
include "src/Jrnv/PHPBench/Contract/ResultPrinterInterface.php";
include "src/Jrnv/PHPBench/Printer/TextPrinter.php";
include "src/Jrnv/PHPBench/Benchmark.php";

$benchmark = new \Jrnv\PHPBench\Benchmark();

$benchmark->addVariant(
    'single quotes', function () {
        $i = '';
    }
);
