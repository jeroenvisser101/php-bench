# PHP Benchmarks
This project aims to do nothing more than simple and easy benchmarking. I always
found benchmarking to be too much of a hassle, and guess the best one on my
knowledge instead. With this simple function, I can do a benchmark in under 2
minutes. That makes it *way* easier to benchmark your PHP code.

## How to use
Usage is very simple. There's one function, `benchmark(string $name, callable
$fn, int $times = 1000000)`. Usage is as follows:

``` php
<?php // quote_benchmark.php

include 'benchmark.php';

benchmark('double quotes', function () {
  $var = "something";
});

benchmark('single quotes', function () {
  $var = 'something';
});
```

When you run this code via `php quote_benchmark.php` it will output the names of
your benchmarks along with the amount of milliseconds it took to execute the
code. Below, there's a sample output that you'd get when running
`php example.php`:

```
single quotes: 2.6323640346527 ms
double quotes: 2.6998770236969 ms
```

## Contributing
Although simple, this single function could be extended a lot. I would love to
be able to set an option to retrieve microseconds instead of milliseconds. The
project is open-sourced to enable you to help. Fork the project, make your
changes and let me know by a pull request.

## License
This project is released under the public domain.
