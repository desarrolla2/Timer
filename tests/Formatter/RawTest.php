<?php
/*
 * This file is part of the Timer package.
 *
 * (c) Daniel González <daniel@desarrolla2.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Desarrolla2\Timer\Formatter\Test;

use Desarrolla2\Timer\Formatter\Raw;

/**
 * RawTest
 */
class RawTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \FormatterInterface
     */
    protected $formatter;

    public function setUp()
    {
        $this->formatter = new Raw();
    }

    /**
     * @return array
     */
    public function dataProvider()
    {
        return [
            [1, 1],
            [2, 2],
            [3, 3],
        ];
    }

    /**
     * @param int $expected
     * @param int $time
     *
     * @dataProvider dataProvider
     */
    public function testTime($expected, $time)
    {
        $this->assertEquals(
            $expected,
            $this->formatter->time($time)
        );
    }

    /**
     * @param int $expected
     * @param int $size
     *
     * @dataProvider dataProvider
     */
    public function testMemory($expected, $size)
    {
        $this->assertEquals(
            $expected,
            $this->formatter->memory($size)
        );
    }
}