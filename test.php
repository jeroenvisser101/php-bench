<?php
include "src/Jrnv/PHPBench/Contract/ResultPrinterInterface.php";
include "src/Jrnv/PHPBench/Printer/TextPrinter.php";
include "src/Jrnv/PHPBench/Benchmark.php";

$benchmark = new \Jrnv\PHPBench\Benchmark(100);

$benchmark->addVariant(
    'single quotes',
    function () {
        $i = '';
    }
);

$benchmark->addVariant(
    'double quites',
    function () {
        $i = "";
    }
);

$benchmark->run();
