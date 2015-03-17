<?php

/*
 * This file is part of the Timer package.
 *
 * Copyright (c) Daniel González
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Daniel González <daniel@desarrolla2.com>
 */

namespace Desarrolla2\Timer\Formatter;

/**
 * Human
 */
class Human implements FormatterInterface
{
    /**
     * @param int $time
     *
     * @return string
     */
    public function time($time)
    {
        return $time;
    }

    /**
     * @param int $size
     *
     * @return string
     */
    public function memory($size)
    {
        $scaleUnit = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];

        return sprintf('%.2f %s', $size / pow(1024, ($scale = floor(log($size, 1024)))), $scaleUnit[$scale]);
    }
}
