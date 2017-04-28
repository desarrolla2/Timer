# Timer

This script works as simple timer control to your app

[![Build Status](https://secure.travis-ci.org/desarrolla2/Timer.png)](http://travis-ci.org/desarrolla2/Timer)

[![Latest Stable Version](https://poser.pugx.org/desarrolla2/timer/v/stable.png)](https://packagist.org/packages/desarrolla2/timer) [![Total Downloads](https://poser.pugx.org/desarrolla2/timer/downloads.png)](https://packagist.org/packages/desarrolla2/timer)

## Installation

### With Composer

It is best installed it through [packagist](http://packagist.org/packages/desarrolla2/timer) 
by including `desarrolla2/timer` in your project composer.json require:

``` json
    "require": {
        // ...
        "desarrolla2/timer":  "*"
    }
```

### Without Composer

You can also download it from [Github] (https://github.com/desarrolla2/Timer),  but no autoloader is provided so 
you'll need to register it with your own PSR-4  compatible autoloader.

## Usage
   
``` php   
<?php
require __DIR__ . '/../vendor/autoload.php';

use Desarrolla2\Timer\Timer;

$timer = new Timer();

$timer->mark('Starting a mark previous to operations');

foreach ($aLotOfOperations as $operation) {
    $timer->mark('Start operation '.$operation->name);
    
    $operation->doSomething();
    
    $timer->mark('End operation '.$operation->name);
}

$timer->mark('Ended a mark previous to operations');

```

## Formatting

// ..

## Contact

You can contact with me on [@desarrolla2](https://twitter.com/desarrolla2).
