<?php
namespace Aws\Test\Api;

use Aws\Api\ErrorParser;
use Aws\Api\Operation;
use Aws\Api\Parser;
use Aws\Api\Parser\QueryParser;
use Aws\Api\Parser\XmlParser;
use Aws\Api\Serializer;
use Aws\Api\Service;
use Aws\Api\StructureShape;
use Aws\Test\TestServiceTrait;
use Aws\Test\UsesServiceTrait;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

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
        $this->assertIsArray($s->getMetadata());
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
        $this->assertInstanceOf(Operation::class, $s->getOperation('foo'));
        $this->assertArrayHasKey('foo', $s->getOperations());
    }

    public function testEnsuresOperationExists()
    {
        $this->expectException(\InvalidArgumentException::class);
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
            ['json', ErrorParser\JsonRpcErrorParser::class],
            ['rest-json', ErrorParser\RestJsonErrorParser::class],
            ['query', ErrorParser\XmlErrorParser::class],
            ['rest-xml', ErrorParser\XmlErrorParser::class]
        ];
    }

    /**
     * @dataProvider errorParserProvider
     */
    public function testCreatesRelevantErrorParsers($p, $cl)
    {
        $this->assertInstanceOf($cl, Service::createErrorParser($p));
    }

    public function testThrowsOnUnexpectedProtocol()
    {
        $this->expectException(\UnexpectedValueException::class);
        Service::createErrorParser('undefined_protocol');
    }

    public function serializerDataProvider()
    {
        return [
            ['json', Serializer\JsonRpcSerializer::class],
            ['rest-json', Serializer\RestJsonSerializer::class],
            ['rest-xml', Serializer\RestXmlSerializer::class],
            ['query', Serializer\QuerySerializer::class],
            ['ec2', Serializer\QuerySerializer::class],
        ];
    }

    /**
     * @dataProvider serializerDataProvider
     */
    public function testCreatesSerializer($type, $cl)
    {
        $data = ['metadata' => ['protocol' => $type]];
        if ($type === 'json') {
            $data['metadata']['jsonVersion'] = '1.1';
        }
        $service = new Service(
            $data,
            function () { return []; }
        );
        $serializer = Service::createSerializer($service, $type);
        $this->assertInstanceOf($cl, $serializer);
    }

    public function parserDataProvider()
    {
        return [
            ['json', Parser\JsonRpcParser::class],
            ['rest-json', Parser\RestJsonParser::class],
            ['rest-xml', Parser\RestXmlParser::class],
            ['query', Parser\QueryParser::class],
            ['ec2', Parser\QueryParser::class],
        ];
    }

    /**
     * @dataProvider parserDataProvider
     */
    public function testCreatesParsers($type, $cl)
    {
        $service = new Service(
            ['metadata' => ['protocol' => $type]],
            function () { return []; }
        );
        $parser = Service::createParser($service);
        $this->assertInstanceOf($cl, $parser);

        if ($parser instanceof QueryParser) {
            $this->assertInstanceOf(
                XmlParser::class,
                $this->getPropertyValue($parser, 'parser')
            );
        }
    }

    public function testGetClientContextParams()
    {
        $params = [
            'Foo' => [
                'type' => 'string',
                'documentation' => 'blah blah blah'
            ]
        ];
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
                ],
                'clientContextParams' => $params
            ],
            function () { return []; }
        );

        $clientContextParams = $s->getClientContextParams();
        $this->assertEquals($params, $clientContextParams);
    }

    public function testModifyModel()
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
        $definition = $s->getDefinition();
        $definition['metadata']['serviceId'] = 'bar';
        $s->setDefinition($definition);
        $this->assertTrue($s->isModifiedModel());
        $this->assertEquals( 'bar', $s->getMetadata('serviceId'));
    }
}
