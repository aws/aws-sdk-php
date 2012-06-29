<?php

namespace Aws\Tests\Common\Exception;

use Aws\Common\Exception\InstanceProfileCredentialsException;

class InstanceProfileCredentialsExceptionTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\Common\Exception\InstanceProfileCredentialsException::getStatusCode
     * @covers Aws\Common\Exception\InstanceProfileCredentialsException::setStatusCode
     */
    public function testOwnsStatusCode()
    {
        $e = new InstanceProfileCredentialsException('Foo');
        $this->assertNull($e->getStatusCode());
        $e->setStatusCode('Bar');
        $this->assertEquals('Bar', $e->getStatusCode());
    }
}
