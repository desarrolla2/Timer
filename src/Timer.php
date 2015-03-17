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

namespace Desarrolla2\Timer;

/**
 * Timer
 */
class Timer implements TimerInterface
{
    /**
     * @var int
     */
    protected $time;

    /**
     * @var array
     */
    protected $marks = [];

    public function __construct()
    {
        $this->start();
        $this->mark('Created Timer');
    }

    /**
     *
     */
    public function reset()
    {
        $this->marks = [];
        $this->start();
    }

    /**
     * @param string $text
     *
     * @return array
     */
    public function mark($text = '')
    {
        $text = $text ? $text : 'Create mark';
        $total = microtime(true) - $this->time;

        $lastMark = end($this->marks);
        $fromPreviousTime = $total - $lastMark['total'];

        return $this->marks[] = [
            'text' => $text,
            'total' => $total,
            'from_previous' => $fromPreviousTime,
            'memory' => $this->getMemoryUsage(),
        ];
    }

    protected function start()
    {
        $this->time = microtime(true);
    }

    /**
     * @return array
     */
    public function get()
    {
        $this->mark('Get Time');

        return $this->marks;
    }

    /**
     * @return string
     */
    protected function getMemoryUsage()
    {
        $size = memory_get_peak_usage(true);
        $unit = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];

        return sprintf('%.2f %s', $size / pow(1024, ($i = floor(log($size, 1024)))), $unit[$i]);
    }
}
