<?php

/**
 * This file is part of the timer proyect.
 * 
 * Description of Timer
 *
 * @author : Daniel González Cerviño <daniel.gonzalez@daniel.gonzalez@freelancemadrid.es>
 * @file : Timer.php , UTF-8
 * @date : Sep 5, 2012 , 5:13:20 PM
 */
class Timer
{

    private $time;
    private $pause = 0;
    private $store = array();

    public function __construct($start = true)
    {
        if ($start) {
            $this->play();
        }
    }

    public function reset()
    {
        $this->store = array();
        $this->time = microtime(true);
    }

    public function play()
    {
        if ($this->pause > 0) {
            $this->time += (microtime(true) - $this->pause);
            $this->pause = 0;
        } elseif (!$this->store) {
            $this->time = microtime(true);
            $where = array();

            foreach (debug_backtrace() as $row) {
                $where[] = $row['file'] . ' (line ' . $row['line'] . ')';
            }

            $this->store[] = array(
                'text' => 'Timing start',
                'total' => 0,
                'from_previous' => 0,
                'where' => $where
            );
        }
    }

    public function mark($text = '')
    {
        $text = $text ? $text : 'Timing info';
        $total = microtime(true) - $this->time;

        $where = array();

        foreach (debug_backtrace() as $row) {
            $where[] = $row['file'] . ' (line ' . $row['line'] . ')';
        }

        $from_previous = end($this->store);
        $from_previous = $total - $from_previous['total'];

        $this->play();

        return $this->store[] = array(
            'text' => $text,
            'total' => $total,
            'from_previous' => $from_previous,
            'where' => $where
        );
    }

    public function get()
    {
        $this->mark();

        return $this->store;
    }

    public function getMemoryUsage()
    {
        $size = memory_get_peak_usage(true);
        $unit = array('b', 'kb', 'mb', 'gb', 'tb', 'pb');

        return sprintf('%.2f %s', $size / pow(1024, ($i = floor(log($size, 1024)))), $unit[$i]);
    }

}

