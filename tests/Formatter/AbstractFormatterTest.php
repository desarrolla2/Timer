<?php
/*
 * This file is part of the mitula.products package.
 *
 * (c) Daniel González <daniel@desarrolla2.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Desarrolla2\Timer\Formatter\Test;


abstract class AbstractFormatterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \FormatterInterface
     */
    protected $formatter;

    /**
     * @return array
     */
    abstract public function dataProviderForTime();

    /**
     * @return array
     */
    abstract public function dataProviderForMemory();

    /**
     * @param int $expected
     * @param int $time
     *
     * @dataProvider dataProviderForTime
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
     * @dataProvider dataProviderForMemory
     */
    public function testMemory($expected, $size)
    {
        $this->assertEquals(
            $expected,
            $this->formatter->memory($size)
        );
    }
}
