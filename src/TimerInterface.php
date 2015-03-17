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
 * Interface TimerInterface
 */
interface TimerInterface
{

    /**
     * @param bool $start
     */
    public function __construct($start = true);

    /**
     *
     */
    public function reset();

    /**
     * @param string $text
     *
     * @return mixed
     */
    public function mark($text = '');

    /**
     * @return mixed
     */
    public function get();
}
