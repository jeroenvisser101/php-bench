<?php

include 'benchmark.php';

benchmark('single quotes', function () {
  $var = 'something';
});

benchmark('double quotes', function () {
  $var = "something";
});
