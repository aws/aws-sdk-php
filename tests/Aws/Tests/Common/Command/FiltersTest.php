<?php

namespace Aws\Tests\Common\Command;

use Aws\Common\Command\Filters;

/**
 * @covers Aws\Common\Command\Filters
 */
class FiltersTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @return array
     */
    public function booleanToStringProvider()
    {
        return array(
            array(true, 'true'),
            array(false, 'false'),
            array(0, 'false'),
            array(1, 'true'),
            array('true', 'true'),
            array('false', 'false'),
            array(new \stdClass(), 'false')
        );
    }

    /**
     * @dataProvider booleanToStringProvider
     */
    public function testConvertsBooleansToStrings($input, $output)
    {
        $this->assertEquals($output, Filters::booleanToString($input));
    }

    /**
     * @return array
     */
    public function stringToBooleanProvider()
    {
        return array(
            array('true', true),
            array('on', true),
            array(1, true),
            array(0, false),
            array(false, false),
            array('false', false),
            array('off', false)
        );
    }

    /**
     * @dataProvider stringToBooleanProvider
     */
    public function testConvertsStringsToBooleans($input, $output)
    {
        $this->assertEquals($output, Filters::stringToBoolean($input));
    }

    /**
     * @return array
     */
    public function timestampProvider()
    {
        $t = time();

        return array(
            array($t, $t),
            array(123, 123),
            array('November 20, 1984', 469785600)
        );
    }

    /**
     * @dataProvider timestampProvider
     */
    public function testConvertsValueToTimestamp($input, $output)
    {
        $this->assertEquals($output, Filters::getTimestamp($input));
    }
}
