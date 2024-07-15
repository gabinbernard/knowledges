<?php

#
# PHP Core Password Hashing
#
# https://www.php.net/manual/en/book.password.php
#

$password = "DummyPassword";

# Get available password hashing algorithms ids
# As of PHP 7.4, those ids are strings, used to be integers
print_r(password_algos());

# Hash a password
# As of PHP 5.5, PASSWORD_DEFAULT is bcrypt
#
# Compile PHP with --with-password-argon2 
# to include PASSWORD_ARGON2I and PASSWORD_ARGON2ID
$hashed = password_hash($password, PASSWORD_DEFAULT, $options = ["cost" => 12]);

# Verify if password needs to be rehashed
$needsRehash = password_needs_rehash($hashed, PASSWORD_DEFAULT, $options = ["cost" => 14]);
echo "Password needs rehash? " . ($needsRehash ? 'Yes' : 'No') . PHP_EOL;

# Get info about a hash
print_r(password_get_info($hashed));

echo password_verify("WrongPassword", $hashed) . PHP_EOL;
echo password_verify($password, $hashed) . PHP_EOL;

// Other constants

echo "PASSWORD_BCRYPT_DEFAULT_COST: " . PASSWORD_BCRYPT_DEFAULT_COST . PHP_EOL;