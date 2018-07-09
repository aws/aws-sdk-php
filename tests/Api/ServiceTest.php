<?php
namespace Aws\Test\Api;

use Aws\Api\Service;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Api\Service
 */
class ServiceTest extends TestCase
{
    use UsesServiceTrait;

    public function testSetsDefaultValues()
    {
        $s = new Service([], function () { return []; });
        $this->assertSame([], $s['operations']);
        $this->assertSame([], $s['shapes']);
    }

    public function testImplementsArrayAccess()
    {
        $s = new Service(['metadata' => ['foo' => 'bar']], function () { return []; });
        $this->assertEquals('bar', $s['metadata']['foo']);
        $this->assertNull($s['missing']);
        $s['abc'] = '123';
        $this->assertEquals('123', $s['abc']);
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
        $this->assertEquals('Foo Service', $s->getServiceFullName());
        $this->assertEquals('foo', $s->getServiceName());
        $this->assertEquals('Foo', $s->getServiceId());
        $this->assertEquals('bar', $s->getEndpointPrefix());
        $this->assertEquals('baz', $s->getApiVersion());
        $this->assertEquals('qux', $s->getSigningName());
        $this->assertEquals('yak', $s->getProtocol());
        $this->assertEquals('foo-2016-12-09', $s->getUid());
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
        $this->assertEquals('foo', $s->getMetadata('serviceFullName'));
        $this->assertNull($s->getMetadata('baz'));
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

    public function serviceIdDataProvider()
    {
        return [
            ['AWS New Service', '', '', 'New Service'],
            ['AWS New Service', 'ANS', '', 'ANS'],
            ['Amazon New Service', '', '', 'New Service'],
            ['Amazon New Service', 'AWS NS', '', 'NS'],
            ['Amazon New 555 Service', '', '', 'New 555 Service'],
            ['555 Amazon New Service', '', '', 'New Service'],
            [' 555 Amazon New Service', '', '', 'New Service'],
            ['555 Amazon New Service', '555 NS', '', 'NS'],
            ['Amazon New Service555', '', '', 'New Service555'],
            ['AWS New Service555', 'AWS NS 555', '', 'NS 555'],
            ['  AWS @New-Service!', '', '', 'NewService'],
            ['New Service Full Name', '  AWS @New-Service!', '', 'NewService'],
            ['Fullname', 'Abbv', 'Supplied', 'Supplied'],
        ];
    }

    /**
     * @dataProvider serviceIdDataProvider
     */
    public function testGeneratesDefaultServiceIds($fullName, $abbv, $id, $expected)
    {
        $service = new Service([
            'metadata' => [
                'serviceFullName' => $fullName,
                'serviceAbbreviation' => $abbv,
                'serviceId' => $id
            ]
        ], function() {});
        $this->assertEquals($expected, $service->getServiceId());
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
        $this->setExpectedException('UnexpectedValueException');
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
