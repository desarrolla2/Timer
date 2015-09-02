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
                'raw' => $time,
                'from_start' => $this->formatter->time($time - $this->time),
            ],
            'memory' => [
                'raw' => $memory,
                'total' => $this->formatter->memory($memory),
                'from_start' => $this->formatter->memory($memory - $this->memory),
            ],
        ];

        $previous = end($this->marks);

        if ($previous) {
            $mark['time']['from_previous'] = $this->formatter->time($time - $previous['time']['raw']);
            $mark['memory']['from_previous'] = $this->formatter->memory($memory - $previous['memory']['raw']);
        } else {
            $mark['time']['from_previous'] = false;
            $mark['memory']['from_previous'] = false;
        }

        $this->marks[] = $mark;

        return $mark;
    }

    /**
     * @param string $text
     *
     * @return array
     */
    public function getNow($text = '')
    {
        $this->mark($text);

        return end($this->marks);
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->marks;
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
