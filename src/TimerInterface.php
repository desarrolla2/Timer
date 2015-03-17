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

/**
 * Interface TimerInterface
 */
interface TimerInterface
{
    /**
     * @param FormatterInterface $formatter
     */
    public function __construct(FormatterInterface $formatter = null);

    /**
     * @param string $text
     *
     * @return array
     */
    public function mark($text = '');
}
