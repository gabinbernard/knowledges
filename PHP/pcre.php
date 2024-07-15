<?php

#
# Perl Compatible Regular Expressions
#
# https://www.php.net/manual/en/book.pcre.php
#

$p1 = "/[0-9]+/";
$str1 = "Hi, I am Gab1 BERN4RD, web developer since 1991.";
$matches = [];

# Get first regex match in string
$hasMatch = preg_match($p1, $str1, $matches);
print_r($matches);

# Get every regex matches in string
$matchCount = preg_match_all($p1, $str1, $matches);
print_r($matches);

# Replace regex matches in string or array
print_r(preg_replace($p1, "----", [$str1, strrev($str1)]));
echo preg_replace_callback($p1, function ($matches) {
    return str_repeat("-", strlen($matches[0]));

}, $str1) . PHP_EOL;

# Replace regex matches in string using associave array
echo preg_replace_callback_array(
    [
        "/[0-9]/" => function ($m) {
            return "0";
        },
        "/[a-z]/" => function ($m) {
            return "a";
        },
        "/[A-Z]/" => function ($m) {
            return "A";
        }
    ],
    $str1
) . PHP_EOL;

# Filter (and replace) in array
print_r(preg_filter('/[a-z]+/', ":)", ['A45', 'b25', 'c24', 'D11', '511']));

# Split string using regex matches
print_r(preg_split($p1, $str1));

# Grep with regex
print_r(preg_grep("/[a-z]+/i", ["Gab", "123", "A2", "25", "LoL"]));

# Escape regex special characters
echo preg_quote('[a-z]+') . PHP_EOL;

# Get last execution error
preg_match("/", $str1, $matches);
echo "PREG last error: " . preg_last_error() . " => " . preg_last_error_msg() . PHP_EOL;