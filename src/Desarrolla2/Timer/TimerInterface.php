<?php

/**
 * This file is part of the Timer proyect.
 * 
 * Description of TimerInterface
 *
 * @author : Daniel González Cerviño <daniel.gonzalez@ideup.com>
 * @file : TimerInterface.php , UTF-8
 * @date : Oct 2, 2012 , 9:39:09 AM
 */

namespace Desarrolla2\Timer;

interface TimerInterface
{

    /**
     * @param boolean $start
     */
    public function __construct($start = true);

    /**
     * 
     */
    public function reset();

    /**
     * 
     */
    public function play();

    /**
     * 
     * @param type $text
     * @return type
     */
    public function mark($text = '');

    /**
     * 
     * @return type
     */
    public function get();

}