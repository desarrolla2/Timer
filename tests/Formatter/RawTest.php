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
class RawTest extends AbstractFormatterTest
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
    public function dataProviderForTime()
    {
        return [
            [1, 1],
            [2, 2],
            [3, 3],
        ];
    }

    /**
     * @return array
     */
    public function dataProviderForMemory()
    {
        return [
            [1, 1],
            [2, 2],
            [3, 3],
        ];
    }
}