<?php

#
# What's new in PHP 8.3
# 
# Based on the article below
# https://stitcher.io/blog/new-in-php-83
#

# Readonly amendments
# - Reset readonly props while cloning, RFC proposed another ignored change

use Random\IntervalBoundary;

readonly class Post
{
    public function __construct(
        public DateTime $createdAt,
    ) {
    }

    public function __clon()
    {
        $this->createdAt = new DateTime();
        // This is now allowed, even though it's final
    }
}

# Typed class constants
# - Class constants can now be typed

class Foo
{
    const string BAR = 'baz';
}

# #[Override] attribute
# - Used to show dev's intent: "I know it's overriding another method"

abstract class OverrideParent
{
    public function method()
    {
        return 0;
    }
}

final class OverrideChild extends OverrideParent
{
    #[Override]
    public function method()
    {
        return 1;
    }
}

# Negative array indices [BREAKING]
# - Add element with index -5, add another item, index would be 0 before, -4 now

$negArr = [];
$negArr[-5] = 0;
$negArr[] = 0; # Before: index 0 | Now: index -4

# Anonymous readonly classes

$anonClass = new readonly class {
    public function __construct(
        public string $foo = 'bar',
    ) {
    }
};

# New json_validate() function
# - Validates whether JSON is valid or not, takes less memory than decoding

echo (json_validate('{"key":"val"}') ? "Valid" : "Invalid") . PHP_EOL; # Valid
echo (json_validate('{"key":val}') ? "Valid" : "Invalid") . PHP_EOL; # Invalid

# RAndomizer additions
# - getBytesFromString | Make string on length n from random bytes of another string
# - getFloat | Returns float between a and b, IntervalBoundary -> Close (includes) / Open (Excludes)
# - nextFloat | Shorthand for getFloat(0, 1, Random\IntervalBoundary::ClosedOpen)

$randomizer = new Random\Randomizer();
echo $randomizer->getBytesFromString("ABCD", 8) . PHP_EOL;
echo $randomizer->getFloat(0, 1, Random\IntervalBoundary::ClosedClosed) . PHP_EOL;
echo $randomizer->nextFloat() . PHP_EOL;

# Dynamic class constant fetch
# - New syntax : Foo::{$bar}

class DynFoo
{
    const DYN_BAR = "dyn_baz";
}

$name = "DYN_BAR";
echo constant(DynFoo::class . "::" . $name) . PHP_EOL; # Before
echo DynFoo::{$name} . PHP_EOL; # Now

# More appropriate Date/Time exceptions [BREAKING]
# - Enhance previously used generic exceptions by providing new error types

# Improved unserialize() error handling
# - Now always emits E_WARNING, RFC proposed other exceptions but got rejected

# Changes to the range() function [BREAKING]
# - TypeArray thrown when passing objects, resources or array to the Boundary inputs
# - Improved errors
# - Produce list of chars if one of boundary inputs is a string digit instead of casting the other input to int 

# Traits and static properties [BREAKING]
# - Uses of traits with static properties will now redeclare 
#   static properties inherited from the parent class. 
#   This will create a separate static property storage for 
#   the current class. This is analogous to adding the static 
#   property to the class directly without traits.

# Stack overflow detection
# - zend.max_allowed_stack_size: -1 = no limit, 0 = autoset, >0 = stack size
# - zend.reserved_stack_size: Defines buffer zone so that php doesn't run out of memory on stack overflow
# - Makes debugging easier

# New mb_str_pad function
# - Multibyte equivalent of str_pad

# Magic method closures and named arguments
# - Create closures from magic methods and pass named arguments to them

# Invariant constant visibility [BREAKING]
# - Previous bug: Constant visibility weren't checked when implementing interfaces

interface I
{
    public const FOO = 'foo';
}

// class C implements I
// {
//     private const FOO = 'foo';
// }

# Small deprecations RFC
# - Passing negative $widths to mb_strimwidth()
# - NumberFormatter::TYPE_CURRENCY
# - Remove pre-PHP 7.1 Mt19937 implementation
# - Remove calling ldap_connect() with 2 parameters $host and $port
# - Remains of string evaluated code assertions
