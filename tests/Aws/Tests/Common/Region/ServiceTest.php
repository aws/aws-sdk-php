<?php

namespace Aws\Tests\Common\Region;

use Aws\Common\Region\Service;

/**
 * @covers Aws\Common\Region\Service
 */
class ServiceTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testIsDataAccessObject()
    {
        $service = new Service('foo', 'foo baz bar');
        $this->assertEquals('foo', $service->getName());
        $this->assertEquals('foo baz bar', $service->getFullName());
    }

    public function testConvertsToString()
    {
        $service = new Service('foo', 'foo baz bar');
        $this->assertEquals('foo', (string) $service);
    }
}
