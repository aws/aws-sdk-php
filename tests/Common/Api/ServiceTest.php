<?php
namespace Aws\Test\Common\Api;

use Aws\Common\Api\Service;
use Aws\Test\UsesServiceTrait;

/**
 * @covers \Aws\Common\Api\Service
 */
class ServiceTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testSetsDefaultValues()
    {
        $s = new Service(function () {}, '', '');
        $this->assertSame([], $s['operations']);
        $this->assertSame([], $s['shapes']);
    }

    public function testImplementsArrayAccess()
    {
        $s = new Service(function () {
            return ['metadata' => ['foo' => 'bar']];
        }, '', '');
        $this->assertSame(['foo' => 'bar'], $s['metadata']);
        $this->assertNull($s['missing']);
        $s['abc'] = '123';
        $this->assertEquals('123', $s['abc']);
        $this->assertSame([], $s['shapes']);
    }

    public function testReturnsApiData()
    {
        $s = new Service(function () {
            return ['metadata' => [
                'serviceFullName' => 'foo',
                'endpointPrefix' => 'bar',
                'apiVersion' => 'baz',
                'signingName' => 'qux',
                'protocol' => 'yak',
            ]];
        }, '', '');
        $this->assertEquals('foo', $s->getServiceFullName());
        $this->assertEquals('bar', $s->getEndpointPrefix());
        $this->assertEquals('baz', $s->getApiVersion());
        $this->assertEquals('qux', $s->getSigningName());
        $this->assertEquals('yak', $s->getProtocol());
    }

    public function testReturnsMetadata()
    {
        $s = new Service(function () {}, '', '');
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
        $s = new Service(function () {
            return ['operations' => ['foo' => ['input' => []]]];
        }, '', '');
        $this->assertTrue($s->hasOperation('foo'));
        $this->assertInstanceOf('Aws\Common\Api\Operation', $s->getOperation('foo'));
        $this->assertArrayHasKey('foo', $s->getOperations());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEnsuresOperationExists()
    {
        $s = new Service(function () {}, '', '');
        $s->getOperation('foo');
    }

    public function testCanRetrievePaginationConfig()
    {
        $expected = [
            'input_token'  => 'a',
            'output_token' => 'b',
            'limit_key'    => 'c',
            'result_key'   => 'd',
            'more_results' => 'e',
        ];

        // Stub out the API provider
        $service = new Service(function () use ($expected) {
            return ['pagination' => ['foo' => $expected]];
        }, '', '');
        $actual = $service->getPaginatorConfig('foo');
        $this->assertSame($expected, $actual);
    }

    public function testLoadWaiterConfigs()
    {
        $api = new Service(
            function () {
                return ['waiters' => ['Foo' => ['bar' => 'baz']]];
            },
            '',
            ''
        );

        $config = $api->getWaiterConfig('Foo');
        $this->assertEquals(['bar' => 'baz'], $config);

        $this->setExpectedException('UnexpectedValueException');
        $config = $api->getWaiterConfig('Fizz');
    }

    public function errorParserProvider()
    {
        return [
            ['json', 'Aws\Common\Api\ErrorParser\JsonRpcErrorParser'],
            ['rest-json', 'Aws\Common\Api\ErrorParser\RestJsonErrorParser'],
            ['query', 'Aws\Common\Api\ErrorParser\XmlErrorParser'],
            ['rest-xml', 'Aws\Common\Api\ErrorParser\XmlErrorParser']
        ];
    }

    /**
     * @dataProvider errorParserProvider
     */
    public function testCreatesRelevantErrorParsers($p, $cl)
    {
        $this->assertInstanceOf($cl, Service::createErrorParser($p));
    }

    public function serializerDataProvider()
    {
        return [
            ['json', 'Aws\Common\Api\Serializer\JsonRpcSerializer'],
            ['rest-json', 'Aws\Common\Api\Serializer\RestJsonSerializer'],
            ['rest-xml', 'Aws\Common\Api\Serializer\RestXmlSerializer'],
            ['query', 'Aws\Common\Api\Serializer\QuerySerializer'],
            ['ec2', 'Aws\Common\Api\Serializer\QuerySerializer'],
        ];
    }

    /**
     * @dataProvider serializerDataProvider
     */
    public function testCreatesSerializer($type, $parser)
    {

    }

    public function parserDataProvider()
    {
        return [
            ['json', 'Aws\Common\Api\Parser\JsonRpcParser'],
            ['rest-json', 'Aws\Common\Api\Parser\RestJsonParser'],
            ['rest-xml', 'Aws\Common\Api\Parser\RestXmlParser'],
            ['query', 'Aws\Common\Api\Parser\XmlParser'],
            ['ec2', 'Aws\Common\Api\Parser\XmlParser'],
        ];
    }

    /**
     * @dataProvider parserDataProvider
     */
    public function testCreatesParsers($type, $parser)
    {

    }
}
