# PSR - PHP Standard Recommandations

Reference :
https://www.php-fig.org/psr/


## PSR 0 \[Deprecated] - Autoloading Standard
As of 2014, PSR-4 is an alternative
- [Vendor]\\[Namespace]\\[ClassName]
- \namespace\package\Class_Name => /vendor/namespace/package/Class/Name.php


## PSR 1 - Basic coding standards

### Files
- **Only** use `<?php ?>` and `<?= ?>` tags
- **Only** use UTF-8 **without** BOM
- Should declare symbols **OR** execute logic with side effects **(NOT BOTH)**

### Classnames and Class (+ interfaces & traits) Constants, Properties and Methods
- **Class names** : StudlyCase (must follow PSR-0/PSR-4, PHP >=5.3 should use formal namespace)
- **Constants** : SNAKE_UPPERCASE
- **Properties** : StudlyCaps, camelCase or under_score (should be consistent)
- **Methods** : camelCase


## PSR 2 \[Deprecated] - Coding Style Guide
As of 2019, PSR-12 is an alternative

- 4 spaces indentation, no tabs
- No hard line limit, 120 soft limit, <80 characters recommanded
- Must use Unix LF for line ending, no trailing whitespace on non-blank lines
- Single empty line at the end, `?>` omitted for PHP-only files

### Declarations

```php
<?php 
namespace Vendor\Package;
# Empty line after "namespace" declaration
use FooNamespace;
use BarNamespace;
# Empty line after "use" declarations block

```

### Classes, properties and methods

```php
class Foo extends Bar implements Baz
{ # New line
    # Properties and methods:
    # [abstract|final] > public/protected/private > [static]
    # No var, No underscore for private/protected
    final protected static string $prop = "val";

    public methodName(int $arg1, int $arg2, int $arg3 = []) # Default value at the end
    { # New line
        # Space after control strucutre keyword, not inside parentheses
        if (true) { # Same line
            // ...
        } # New line
    } # New line

    public method2(
        $arg1,
        $arg2
    ) {
        // ...
    }
} # New line

class Foo2 implements
    /Baz1
    /Baz2
    /Baz3
{
    // ...
}

```

### Control structures and closures

```php
if ($exp1) {
    // ...
} elseif ($exp2) {
    // ...
} else {
    // ...
}

switch ($expr) {
    case 0:
        // ...
        break;
    case 1:
        // ...
        // NO-BREAK
    case 2:
    case 3:
        // ...
        return;
    default:
        // ...
        break;
}

$closureWithArgsAndVars = function ($arg1, $arg2, $arg3 = []) use ($var1, $var2) {
    // ...
};

```


## PSR 3 - Logger Interface

> *Todo*


## PSR 4 - Autoloading standard

Fully qualified classname : \Namespace\SubNamespace\Classname
- Must have top level namespace
- May have one or more sub-namespace
- Must have a terminating class name
- Underscore has no meaning
- Any combination of upper and lower case
- Classes in case sensitive fashion


## PSR 5 \[Draft] - PHPDoc Standard

> *Todo*


## PSR 6 - Caching Interface

> *Todo*


## PSR 7 - HTTP Message Interface

> *Todo*


## PSR 8 \[Abandonned] - Huggable Interface

This PSR is abandonned and won't be covered here.


## PSR 9 \[Abandonned] - Security Advisories

This PSR is abandonned and won't be covered here.


## PSR 10 \[Abandonned] - Security Reporting Process

This PSR is abandonned and won't be covered here.


## PSR 11 - Container Interface

> *Todo*


## PSR 12 - Extended Coding Style Guide

> *Todo*


## PSR 13 - Hypermedia Links

> *Todo*


## PSR 14 - Event Dispatcher

> *Todo*


## PSR 15 - HTTP Handlers

> *Todo*


## PSR 16 - Simple Cache

> *Todo*


## PSR 17 - HTTP Factories

> *Todo*


## PSR 18 - HTTP Client

> *Todo*


## PSR 19 \[Draft] - PHPDoc tags

> *Todo*


## PSR 20 - Clock

> *Todo*


## PSR 21 \[Draft] - Internationalization

> *Todo*


## PSR 22 \[Draft] - Application tracing

> *Todo*
