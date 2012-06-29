<?php

namespace Aws\Tests\Common\Client;

/**
 * @covers Aws\Common\Client\AbstractMissingFunctionOptionResolver
 */
class AbstractMissingFunctionOptionResolverTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testOwnsMissingFunction()
    {
        $foo = function() {};
        $mock = $this->getMockForAbstractClass('Aws\Common\Client\AbstractMissingFunctionOptionResolver');
        $mock->setMissingFunction($foo);
        $this->assertSame($foo, $this->readAttribute($mock, 'missingFunction'));
    }

    /**
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     */
    public function testMissingFunctionMustBeCallable()
    {
        $foo = false;
        $mock = $this->getMockForAbstractClass('Aws\Common\Client\AbstractMissingFunctionOptionResolver');
        $mock->setMissingFunction($foo);
    }

    public function testOwnsMustImplement()
    {
        $mock = $this->getMockForAbstractClass('Aws\Common\Client\AbstractMissingFunctionOptionResolver');
        $mock->setMustImplement(__CLASS__);
        $this->assertEquals(__CLASS__, $this->readAttribute($mock, 'mustImplement'));
    }
}
