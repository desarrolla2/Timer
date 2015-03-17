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


use Desarrolla2\Timer\Formatter\Human;

class HumanTest extends AbstractFormatterTest
{
    /**
     * @var \FormatterInterface
     */
    protected $formatter;

    public function setUp()
    {
        $this->formatter = new Human();
    }

    /**
     * @return array
     */
    public function dataProviderForTime()
    {
        return [
            ['1ms', 0.001],
            ['10ms', 0.01],
            ['100ms', 0.1],
            ['1s', 1],
        ];
    }

    /**
     * @return array
     */
    public function dataProviderForMemory()
    {
        return [
            ['1B', 1],
            ['20B', 20],
            ['300B', 300],
            ['3.91KB', 4000],
            ['48.83KB', 50000],
            ['585.94KB', 600000],
            ['6.68MB', 7000000],
            ['76.29MB', 80000000],
            ['858.31MB', 900000000],
            ['1KB', 1024],
            ['1MB', pow(1024, 2)],
            ['1GB', pow(1024, 3)],
            ['1TB', pow(1024, 4)],
            ['1PB', pow(1024, 5)],
        ];
    }
}
