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
     * Formats:
     * - s: second
     * - ms: milisecond 10−3s
     *
     * @param float $time
     *
     * @return string
     */
    public function time($time)
    {
        if ($time < 1) {
            return round($time * 1000, 2).'ms';
        }

        if ($time < 120) {
            return round($time, 2).'s';
        }

        $seconds = $time % 60;
        $minutes = ($time - $seconds) / 60;

        return sprintf('%dm%ss', $minutes, round($seconds, 2));

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
