<?php

#
# \Random\Randomizer
#
# https://www.php.net/manual/en/random-randomizer.shufflearray.php
#

$rand = new \Random\Randomizer(new \Random\Engine\Secure);

echo $rand->getInt(0, 10) . PHP_EOL;
# 0 to 10

echo $rand->getFloat(0, 1, \Random\IntervalBoundary::ClosedOpen) . PHP_EOL;
# 0 to 1, including 0, excluding 1

echo $rand->nextFloat() . PHP_EOL;
# Shorthand for above expression

echo $rand->nextInt() . PHP_EOL;
# Simply generates a random int

echo bin2hex($rand->getBytes(2)) . PHP_EOL;
# Generates random bytes

echo $rand->getBytesFromString("xD", 12) . PHP_EOL;
# Generates string from another string's randomly selected bytes

print_r($rand->pickArrayKeys(['a' => 'A', 'b' => 'B', 'c' => 'C', 'd' => 'D'], 2));
# Picks n random array keys inside $haystack

echo implode(', ', $rand->shuffleArray(['a' => 'A', 'b' => 'B', 'c' => 'C'])) . PHP_EOL;
# Simply shuffles an array

echo $rand->shuffleBytes('abcdefghijklmnopqrstuvwxyz') . PHP_EOL;
# Simply shuffles a string / bytes

#
# Various \Random\Engine implementations
#
# - Mt19937 is deprecated
#

$s1 = microtime(true);
$r1 = new \Random\Randomizer(new \Random\Engine\Secure);
for ($i = 0; $i < 1000000; $i++) {
    $_ = $r1->nextFloat();
}
$t1 = microtime(true) - $s1;
echo "\Random\Engine\Secure: {$t1}" . PHP_EOL;

$s2 = microtime(true);
$r2 = new \Random\Randomizer(new \Random\Engine\Xoshiro256StarStar());
for ($i = 0; $i < 1000000; $i++) {
    $_ = $r2->nextFloat();
}
$t2 = microtime(true) - $s2;
echo "\Random\Engine\Xoshiro256StarStar: {$t2}" . PHP_EOL;

$s3 = microtime(true);
$r3 = new \Random\Randomizer(new \Random\Engine\PcgOneseq128XslRr64());
for ($i = 0; $i < 1000000; $i++) {
    $_ = $r3->nextFloat();
}
$t3 = microtime(true) - $s3;
echo "\Random\Engine\PcgOneseq128XslRr64: {$t3}" . PHP_EOL;
