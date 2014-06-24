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
        $s = $this->createServiceApi();
        $this->assertSame([], $s['operations']);
        $this->assertSame([], $s['shapes']);
    }

    public function testImplementsArrayAccess()
    {
        $s = $this->createServiceApi(['metadata' => ['foo' => 'bar']]);
        $this->assertSame(['foo' => 'bar'], $s['metadata']);
        $this->assertNull($s['missing']);
        $s['abc'] = '123';
        $this->assertEquals('123', $s['abc']);
        $this->assertSame([], $s['shapes']);
    }

    public function testReturnsApiData()
    {
        $s = $this->createServiceApi(['metadata' => [
            'serviceFullName' => 'foo',
            'endpointPrefix' => 'bar',
            'apiVersion' => 'baz',
            'signingName' => 'qux',
            'protocol' => 'yak',
        ]]);
        $this->assertEquals('foo', $s->getServiceFullName());
        $this->assertEquals('bar', $s->getEndpointPrefix());
        $this->assertEquals('baz', $s->getApiVersion());
        $this->assertEquals('qux', $s->getSigningName());
        $this->assertEquals('yak', $s->getProtocol());
    }

    public function testReturnsMetadata()
    {
        $s = $this->createServiceApi();
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
        $s = $this->createServiceApi(['operations' => ['foo' => ['input' => []]]]);
        $this->assertTrue($s->hasOperation('foo'));
        $this->assertInstanceOf('Aws\Common\Api\Operation', $s->getOperation('foo'));
        $this->assertArrayHasKey('foo', $s->getOperations());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEnsuresOperationExists()
    {
        $this->createServiceApi()->getOperation('foo');
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
        $service = $this->createServiceApi([], $apiProvider);
        $apiProvider->expects($this->any())
            ->method('getServicePaginatorConfig')
            ->will($this->returnValue(['pagination' => ['foo' => $expected]]));

        $actual = $service->getPaginatorConfig('foo');
        $this->assertSame($expected, $actual);
    }

    public function dataForWaiterConfigTest()
    {
        return [
            ['Test', [
                'success_path'  => 'Foo/Baz',
                'success_type'  => 'output',
                'success_value' => 'foo',
                'failure_path'  => 'Foo/Baz',
                'failure_type'  => 'output',
                'max_attempts'  => 10,
                'ignore_errors' => ['1', '2'],
            ]],
            ['Extending', [
                'extends'       => 'Test',
                'success_path'  => 'Foo/Baz',
                'success_type'  => 'output',
                'success_value' => 'foo',
                'failure_path'  => 'Foo/Baz',
                'failure_type'  => 'output',
                'failure_value' => 'fail',
                'max_attempts'  => 10,
                'ignore_errors' => ['1', '2'],
            ]],
            ['Overwrite', [
                'extends'       => 'Test',
                'success_path'  => 'Foo/Baz',
                'success_type'  => 'output',
                'success_value' => 'abc',
                'failure_path'  => 'Foo/Baz',
                'failure_type'  => 'baz',
                'max_attempts'  => 20,
                'ignore_errors' => ['1', '2'],
            ]],
            ['Error', 'UnexpectedValueException']
        ];
    }

    /**
     * @covers Aws\Common\Api\Service::resolveWaiterConfig
     * @dataProvider dataForWaiterConfigTest
     */
    public function testLoadAndResolvesWaiterConfigs($name, $expected)
    {
        $api = $this->createServiceApi([], $apiProvider);
        $apiProvider->expects($this->any())
            ->method('getServiceWaiterConfig')
            ->will($this->returnValue(['waiters' => [
                '__default__' => [
                    'acceptor_path' => 'Foo/Baz',
                    'acceptor_type' => 'output',
                    'max_attempts' => 10,
                ],
                'Test' => [
                    'success_value' => 'foo',
                    'ignore_errors' => ['1', '2'],
                ],
                'Extending' => [
                    'extends' => 'Test',
                    'failure_value' => 'fail',
                ],
                'Overwrite' => [
                    'extends' => 'Test',
                    'max_attempts' => 20,
                    'success_value' => 'abc',
                    'failure_type' => 'baz',
                ]
            ]
        ]));

        // Handle exception test cases
        if (is_string($expected)) {
            $this->setExpectedException($expected);
        }

        // Get the resolved config and verify its correctness
        $actual = $api->getWaiterConfig($name);
        /** @var array $expected */
        foreach ($expected as $key => $value) {
            $this->assertEquals($value, $actual[$key]);
            $this->assertEquals($name, $actual['waiter_name']);
        }
    }
}
