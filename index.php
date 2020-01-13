<?php
$stdin = fopen('php://stdin', 'r');
$n = 0;
$isPrime = [];
$primes = [];

while ($n < 2 || !is_int($n)) {
  echo 'Enter an integer greater than 1 ';
  $n = intval(trim(fgets($stdin)));
}

for ($i = 2; $i <= $n; $i++) {
  array_push($isPrime, true);
}

for ($i = 2; $i <= sqrt($n); $i++) {
  if ($isPrime[$i - 2] === true) {
    for ($j = $i ** 2; $j <= $n; $j = $j + $i) {
      $isPrime[$j - 2] = false;
    }
  }
}

for ($i = 0; $i < count($isPrime); $i++) {
  if ($isPrime[$i] === true) {
    array_push($primes, $i + 2);
  }
}

echo "Primes: " . implode(', ', $primes) . "\n";