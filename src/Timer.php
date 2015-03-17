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

use Desarrolla2\Timer\Formatter\FormatterInterface;
use Desarrolla2\Timer\Formatter\Raw;

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
     * @var int
     */
    protected $memory;

    /**
     * @var FormatterInterface
     */
    protected $formatter;

    /**
     * @var array
     */
    protected $marks;

    /**
     * @param FormatterInterface $formatter
     */
    public function __construct(FormatterInterface $formatter = null)
    {
        if (!$formatter) {
            $formatter = new Raw();
        }
        $this->formatter = $formatter;

        $this->start();
        $this->mark('Create Timer');
    }

    /**
     * @param string $text
     *
     * @return array
     */
    public function mark($text = '')
    {
        $time = $this->getTime();
        $memory = $this->getMemory();

        $mark = [
            'text' => $text ? $text : 'Create mark',
            'time' => [
                'total' => $this->formatter->time($time),
                'raw' => $time,
            ],
            'memory' => [
                'total' => $this->formatter->memory($memory),
                'raw' => $memory
            ],
        ];

        $previous = end($this->marks);

        if ($previous) {
            $mark['time']['from_previous'] = $this->formatter->time($time - $previous['time']['raw']);
            $mark['time']['from_start'] = $this->formatter->time($time - $this->time);
            $mark['memory']['from_previous'] = $this->formatter->memory($memory - $previous['memory']['raw']);
            $mark['memory']['from_start'] = $this->formatter->memory($memory - $this->memory);
        } else {
            $mark['time']['from_previous'] = false;
            $mark['time']['from_start'] = false;
            $mark['memory']['from_previous'] = false;
            $mark['memory']['from_start'] = false;
        }

        $this->marks[] = $mark;

        return $mark;
    }

    protected function start()
    {
        $this->marks = [];
        $this->time = $this->getTime();
        $this->memory = $this->getMemory();
    }


    /**
     * @return int
     */
    protected function getMemory()
    {
        return memory_get_peak_usage(true);
    }

    /**
     * @return mixed
     */
    protected function getTime()
    {
        return microtime(true);
    }
}
