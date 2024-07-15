<?php

#
# Printing in php
#

// Only 1 argument, returns 1
print "Hello\n";

// , or . to concat in echo
echo "Hello", "what's", "up" . "?" . "\n";

// 3 new line methods
echo "New
Line\nAgain" . PHP_EOL;

// Block
echo <<<END
First
    Second
        Third\n
END;

// Variable interpolation
$foo = "Bar";
echo "foo is {$foo}s" . PHP_EOL;

// Echo and print expression handling
echo true ? "true\n" : "false\n";
(false) ? print "true\n" : print "false\n";
echo (1 + 2) * 3 . PHP_EOL;

// Print formatted array
$formatting = 'Numbers | %3$\'-10.2f | %2$-+10.2f | %1$010s |';
$len = printf($formatting . PHP_EOL, 1, 20, 300, 1.2345);
$formatted = sprintf($formatting, 100, 2009.105, 30.41, 1.2345);
echo $formatted . PHP_EOL;
echo "Length => " . $len . PHP_EOL;

// Printf variable types
printf('%1$c %2$c' . PHP_EOL, 65, 66); // ASCII
printf('%1$d, %1$u' . PHP_EOL, -21.2); // Integer and Unsigned decimal number
printf('%1$f %1$F' . PHP_EOL, 212); // Float (locale/non-locale aware)
printf('%1$b %1$o' . PHP_EOL, 213); // Binary and Octal
printf('%1$x %1$X' . PHP_EOL, 213); // Hexadecimal
printf('%1$e %1$E' . PHP_EOL, 212); // Scientific notation
// g, G, h and H = General format with different uppercase variations
// s = string

// Print array
$returned = print_r(['A' => 'a', 'B' => 'b'], true);
echo $returned . PHP_EOL;

// Var dump
var_dump(["A", "B", "C"]);