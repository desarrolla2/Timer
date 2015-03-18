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
     * ': minute 60s
     * s: second
     * ms: milisecond 10−3s
     *
     * @param int $time
     *
     * @return string
     */
    public function time($time)
    {
        if ($time < 1) {
            return round($time * 1000, 2).'ms';
        }

        return round($time, 2).'s';
    }

    /**
     * @param int $size
     *
     * @return string
     */
    public function memory($size)
    {
        if ($size == 0) {
            return '0';
        }
        $scaleUnit = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
        $scale = floor(log($size, 1024));
        $size = round($size / pow(1024, ($scale)), 2);

        return $size.$scaleUnit[$scale];
    }
}
