<?php
namespace Aws\Test\Api;

use Aws\Api\Service;

/**
 * @covers \Aws\Api\Service
 */
class ServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testSetsDefaultValues()
    {
        $s = new Service([]);
        $this->assertSame([], $s['operations']);
        $this->assertSame([], $s['shapes']);
    }

    public function testImplementsArrayAccess()
    {
        $s = new Service(['metadata' => ['foo' => 'bar']]);
        $this->assertSame(['foo' => 'bar'], $s['metadata']);
        $this->assertNull($s['missing']);
        $s['abc'] = '123';
        $this->assertEquals('123', $s['abc']);
        $this->assertSame([], $s['shapes']);
    }

    public function testReturnsApiData()
    {
        $s = new Service(['metadata' => [
            'serviceFullName' => 'foo',
            'endpointPrefix' => 'bar',
            'apiVersion' => 'baz'
        ]]);
        $this->assertEquals('foo', $s->getServiceFullName());
        $this->assertEquals('bar', $s->getEndpointPrefix());
        $this->assertEquals('baz', $s->getApiVersion());
    }

    public function testReturnsMetadata()
    {
        $s = new Service([]);
        $this->assertSame([], $s->getMetadata());
        $s['metadata'] = [
            'serviceFullName' => 'foo',
            'endpointPrefix' => 'bar',
            'apiVersion' => 'baz'
        ];
        $this->assertEquals('foo', $s->getMetadata('serviceFullName'));
        $this->assertNull($s->getMetadata('baz'));
    }

    public function testReturnsIfOperationExists()
    {
        $s = new Service(['operations' => ['foo' => ['input' => []]]]);
        $this->assertTrue($s->hasOperation('foo'));
        $this->assertInstanceOf('Aws\Api\Operation', $s->getOperation('foo'));
        $this->assertArrayHasKey('foo', $s->getOperations());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEnsuresOperationExists()
    {
        (new Service([]))->getOperation('foo');
    }
}
