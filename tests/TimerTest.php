<?php
/*
 * This file is part of the Timer package.
 *
 * (c) Daniel González <daniel@desarrolla2.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Desarrolla2\Timer\Test;

use Desarrolla2\Timer\Timer;

/**
 * TimerTest
 */
class TimerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Timer
     */
    protected $timer;

    public function setUp()
    {
        $this->timer = new Timer();
    }

    public function testOneMark()
    {
        $this->assertIsMark($this->timer->mark());
    }

    public function testTwoMark()
    {
        $this->timer->mark();
        $this->assertIsMark($this->timer->mark());
    }

    /**
     * @param array $mark
     */
    protected function assertIsMark($mark)
    {
        $this->assertInternalType('array', $mark);
        $this->assertArrayHasKey('text', $mark);
        $this->assertArrayHasKey('time', $mark);
        $this->assertArrayHasKey('memory', $mark);

        $time = $mark['time'];
        $this->assertArrayHasKey('from_start', $time);
        $this->assertArrayHasKey('from_previous', $time);

        $memory = $mark['memory'];
        $this->assertArrayHasKey('total', $memory);
        $this->assertArrayHasKey('from_start', $memory);
        $this->assertArrayHasKey('from_previous', $memory);
    }
}