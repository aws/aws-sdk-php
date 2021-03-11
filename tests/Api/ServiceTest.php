<?php
namespace Aws\Test\Api;

use Aws\Api\Service;
use Aws\Api\StructureShape;
use Aws\Test\TestServiceTrait;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Api\Service
 */
class ServiceTest extends TestCase
{
    use UsesServiceTrait;
    use TestServiceTrait;

    public function testSetsDefaultValues()
    {
        $s = new Service([], function () { return []; });
        $this->assertSame([], $s['operations']);
        $this->assertSame([], $s['shapes']);
    }

    public function testImplementsArrayAccess()
    {
        $s = new Service(['metadata' => ['foo' => 'bar']], function () { return []; });
        $this->assertSame('bar', $s['metadata']['foo']);
        $this->assertNull($s['missing']);
        $s['abc'] = '123';
        $this->assertSame('123', $s['abc']);
        $this->assertSame([], $s['shapes']);
    }

    public function testReturnsApiData()
    {
        $s = new Service(
            [
                'metadata' => [
                    'serviceFullName' => 'Foo Service',
                    'serviceIdentifier' => 'foo',
                    'serviceId'         => 'Foo',
                    'endpointPrefix'  => 'bar',
                    'apiVersion'      => 'baz',
                    'signingName'     => 'qux',
                    'protocol'        => 'yak',
                    'uid'             => 'foo-2016-12-09'
                ]
            ],
            function () { return []; }
        );
        $this->assertSame('Foo Service', $s->getServiceFullName());
        $this->assertSame('foo', $s->getServiceName());
        $this->assertSame('Foo', $s->getServiceId());
        $this->assertSame('bar', $s->getEndpointPrefix());
        $this->assertSame('baz', $s->getApiVersion());
        $this->assertSame('qux', $s->getSigningName());
        $this->assertSame('yak', $s->getProtocol());
        $this->assertSame('foo-2016-12-09', $s->getUid());
    }

    public function testReturnsMetadata()
    {
        $s = new Service([], function () { return []; });
        $this->assertInternalType('array', $s->getMetadata());
        $s['metadata'] = [
            'serviceFullName' => 'foo',
            'endpointPrefix'  => 'bar',
            'apiVersion'      => 'baz'
        ];
        $this->assertSame('foo', $s->getMetadata('serviceFullName'));
        $this->assertNull($s->getMetadata('baz'));
    }

    public function testReturnsErrorShapes()
    {
        $service = $this->generateTestService('rest-json');
        $errorShapes = $service->getErrorShapes();
        $errorShape = $errorShapes[0];
        $this->assertCount(1, $errorShapes);
        $this->assertInstanceOf(StructureShape::class, $errorShape);
        $this->assertSame('TestException', $errorShape->getName());
    }

    public function testReturnsIfOperationExists()
    {
        $s = new Service(
            ['operations' => ['foo' => ['input' => []]]],
            function () { return []; }
        );
        $this->assertTrue($s->hasOperation('foo'));
        $this->assertInstanceOf('Aws\Api\Operation', $s->getOperation('foo'));
        $this->assertArrayHasKey('foo', $s->getOperations());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEnsuresOperationExists()
    {
        $s = new Service([], function () { return []; });
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
        $service = new Service([], function () use ($expected) {
            return ['pagination' => ['foo' => $expected]];
        });
        $this->assertTrue($service->hasPaginator('foo'));
        $actual = $service->getPaginatorConfig('foo');
        $this->assertSame($expected, $actual);
    }

    public function testLoadWaiterConfigs()
    {
        $api = new Service([], function () {
            return ['waiters' => ['Foo' => ['bar' => 'baz']]];
        });

        $this->assertTrue($api->hasWaiter('Foo'));
        $config = $api->getWaiterConfig('Foo');
        $this->assertEquals(['bar' => 'baz'], $config);

        $this->assertFalse($api->hasWaiter('Fizz'));
        if (method_exists($this, 'expectException')) {
            $this->expectException(\UnexpectedValueException::class);
        } else {
            $this->setExpectedException(\UnexpectedValueException::class);
        }
        $api->getWaiterConfig('Fizz');
    }

    public function errorParserProvider()
    {
        return [
            ['json', 'Aws\Api\ErrorParser\JsonRpcErrorParser'],
            ['rest-json', 'Aws\Api\ErrorParser\RestJsonErrorParser'],
            ['query', 'Aws\Api\ErrorParser\XmlErrorParser'],
            ['rest-xml', 'Aws\Api\ErrorParser\XmlErrorParser']
        ];
    }

    /**
     * @dataProvider errorParserProvider
     */
    public function testCreatesRelevantErrorParsers($p, $cl)
    {
        $this->assertInstanceOf($cl, Service::createErrorParser($p));
    }

    /**
     * @expectedException \UnexpectedValueException
     */
    public function testThrowsOnUnexpectedProtocol()
    {
        Service::createErrorParser('undefined_protocol');
    }

    public function serializerDataProvider()
    {
        return [
            ['json', 'Aws\Api\Serializer\JsonRpcSerializer'],
            ['rest-json', 'Aws\Api\Serializer\RestJsonSerializer'],
            ['rest-xml', 'Aws\Api\Serializer\RestXmlSerializer'],
            ['query', 'Aws\Api\Serializer\QuerySerializer'],
            ['ec2', 'Aws\Api\Serializer\QuerySerializer'],
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
            ['json', 'Aws\Api\Parser\JsonRpcParser'],
            ['rest-json', 'Aws\Api\Parser\RestJsonParser'],
            ['rest-xml', 'Aws\Api\Parser\RestXmlParser'],
            ['query', 'Aws\Api\Parser\XmlParser'],
            ['ec2', 'Aws\Api\Parser\XmlParser'],
        ];
    }

    /**
     * @dataProvider parserDataProvider
     */
    public function testCreatesParsers($type, $parser)
    {

    }
}
