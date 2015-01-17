<?php

function benchmark($name, callable $code, $times = 1000000)
{
  $startTime = microtime(true);

  for ($i = 0; $i <= $times; $i ++) {
    $code();
  }

  echo $name . ': ' . (microtime(true) - $startTime) . " ms\n";
}

