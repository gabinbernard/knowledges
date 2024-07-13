<?php

#
# \Random
#
# https://www.php.net/manual/en/book.random.php
#

#
# Rand
# As of php 7.1, srand, rand and getrandmax are equal to their mt_ counterparts
#

srand(0);
# Seeds the rand generator

echo "rand():          " . rand() . PHP_EOL;
echo "rand(a, b):      " . rand(1, 10) . PHP_EOL;
# Get random value [between a and b]

echo "getrandmax():    " . getrandmax() . PHP_EOL;
# Get max rand value

#
# Mersenne Twister Rand
#

mt_srand(0);
# Seeds the mt_rand generator

echo "mt_rand():       " . mt_rand() . PHP_EOL;
echo "mt_rand(1, 10):  " . mt_rand(1, 10) . PHP_EOL;
# Get random value [between a and b]

echo "mt_getrandmax(): " . mt_getrandmax() . PHP_EOL;
# Get max mt_rand value

#
# Mt19937 implementation of the Mersenne Twister (1997) 
#

class MersenneTwister
{
    private $MT = [];
    private $index = 0;
    private const N = 624;
    private const M = 397;
    private const MATRIX_A = 0x9908b0df;
    private const UPPER_MASK = 0x80000000;
    private const LOWER_MASK = 0x7fffffff;

    public function __construct($seed)
    {
        $this->MT[0] = $seed;
        for ($i = 1; $i < self::N; $i++) {
            $this->MT[$i] = (0x6c078965 * ($this->MT[$i - 1] ^ ($this->MT[$i - 1] >> 30)) + $i);
            $this->MT[$i] &= 0xffffffff;
        }
    }

    public function generate()
    {
        if ($this->index >= self::N) {
            $this->twist();
        }

        $y = $this->MT[$this->index];
        $y ^= ($y >> 11);
        $y ^= ($y << 7) & 0x9d2c5680;
        $y ^= ($y << 15) & 0xefc60000;
        $y ^= ($y >> 18);

        $this->index++;
        return $y & 0xffffffff;
    }

    private function twist()
    {
        for ($i = 0; $i < self::N; $i++) {
            $y = ($this->MT[$i] & self::UPPER_MASK) | ($this->MT[($i + 1) % self::N] & self::LOWER_MASK);
            $this->MT[$i] = $this->MT[($i + self::M) % self::N] ^ ($y >> 1);
            if ($y % 2 != 0) {
                $this->MT[$i] ^= self::MATRIX_A;
            }
        }
        $this->index = 0;
    }
}

// Example usage
$mt = new MersenneTwister(time()); // Seed
$randTable = [];
for ($i = 0; $i < 100; $i++) {
    $randTable[] = 0;
}
for ($i = 0; $i < 10000000; $i++) {
    $r = $mt->generate();
    $randTable[$r % 100]++;
}
echo "Results of our Mt19937 implementation:" . PHP_EOL;
print_r($randTable);

#
# \Random\Randomizer
# See ./randomizer.php
#