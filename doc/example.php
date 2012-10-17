<?php

/**
 * This file is part of the Timer proyect.
 * 
 * Copyright (c)
 * 
 * This source file is subject to the MIT license that is bundled
 * with this package in the file LICENSE.
 *
 * @author : Daniel González <daniel.gonzalez@freelancemadrid.es> 
 * @file : example.php , UTF-8
 * @date : Oct 17, 2012 , 8:59:40 PM

 */
require __DIR__ . '/../vendor/autoload.php';

use Desarrolla2\Timer\Timer;

$timer = new Timer();

echo 'doing something ....' . PHP_EOL;
sleep(1);
$timer->mark('task 1');
echo 'doing something ....' . PHP_EOL;
sleep(1);
$timer->mark('task 2');
var_dump($timer);

