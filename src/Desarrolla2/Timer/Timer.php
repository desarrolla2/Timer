<?php

/**
 * This file is part of the timer proyect.
 * 
 * Description of Timer
 *
 * @author : Daniel González Cerviño <daniel.gonzalez@freelancemadrid.es>
 * @file : Timer.php , UTF-8
 * @date : Sep 5, 2012 , 5:13:20 PM
 */

namespace Desarrolla2\Timer;

use Desarrolla2\Timer\TimerInterface;

class Timer implements TimerInterface
{

    private $time;
    private $store = array();

    /**
     * 
     * @param boolean $start
     */
    public function __construct($start = true)
    {
        $this->time = microtime(true);
        $this->mark('Created Timer');
    }

    /**
     * 
     */
    public function reset()
    {
        $this->store = array();
        $this->time = microtime(true);
    }

    /**
     * 
     * @param type $text
     * @return type
     */
    public function mark($text = '')
    {
        $text = $text ? $text : 'Timing info';
        $total = microtime(true) - $this->time;

        $from_previous = end($this->store);
        $from_previous = $total - $from_previous['total'];

        return $this->store[] = array(
            'text'          => $text,
            'total'         => $total,
            'from_previous' => $from_previous,
            'memory'        => $this->getMemoryUsage()
        );
    }

    /**
     * 
     * @return type
     */
    public function get()
    {
        $this->mark('Get Timer');
        return $this->store;
    }
    /**
     * 
     * @return type
     */
    protected function getMemoryUsage()
    {
        $size = memory_get_peak_usage(true);
        $unit = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
        return sprintf('%.2f %s', $size / pow(1024, ($i = floor(log($size, 1024)))), $unit[$i]);
    }

}

