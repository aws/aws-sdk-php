<?php

namespace Aws\ClientSideMonitoring;

use Aws\Credentials\CredentialProvider;
use Aws\Credentials\Credentials;
use Aws\Result;
use GuzzleHttp\Promise;
use Aws\HandlerList;
use Aws\Api\ApiProvider;
use Aws\Api\Service;
use Aws\Command;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;

/**
 * @covers ApiCallMonitoringMiddleware
 * @covers AbstractMonitoringMiddleware
 */
class ApiCallMonitoringMiddlewareTest extends TestCase
{
    /**
     * Used to get non-public methods for testing
     *
     * @param $name
     * @return \ReflectionMethod
     * @throws \ReflectionException
     */
    protected function getMethod($name)
    {
        $class = new \ReflectionClass('Aws\ClientSideMonitoring\ApiCallMonitoringMiddleware');
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }

    public function testPopulatesMonitoringData()
    {
        $list = new HandlerList();
        $list->setHandler(function ($command, $request) use (&$called) {
            $called = true;
            return Promise\promise_for(new Result([]));
        });

        $credentialProvider = CredentialProvider::fromCredentials(
            new Credentials('testkey', 'testsecret', 'testtoken')
        );
        $list->appendBuild(ApiCallMonitoringMiddleware::wrap(
            $credentialProvider,
            [
                'enabled' => true,
                'port' => 31000,
                'client_id' => 'TestApp'
            ],
            'us-east-1',
            'ec2'
        ));
        $handler = $list->resolve();

        $response = $handler(new Command('RunScheduledInstances', [
            'LaunchSpecification' => [
                'ImageId' => 'test-image',
            ],
            'ScheduledInstanceId' => 'test-instance-id',
            'InstanceCount' => 1,
        ]), new Request('POST', 'http://foo.com'))->wait();
        $this->assertTrue($called);
        $this->assertEquals(
            'RunScheduledInstances',
            $response['@monitoringEvents'][0]['Api']
        );
        $this->assertEquals(
            'ApiCall',
            $response['@monitoringEvents'][0]['Type']
        );
        $this->assertEquals(
            'ec2',
            $response['@monitoringEvents'][0]['Service']
        );
        $this->assertEquals(
            'TestApp',
            $response['@monitoringEvents'][0]['ClientId']
        );
    }

    public function testSerializesData()
    {
        $serializeEventData = $this->getMethod('serializeEventData');
        $middleware = new ApiCallMonitoringMiddleware(function(){}, function(){}, [], 'test', 'test');
        $eventData = [
            'Api' => 'GetBucket',
            'AttemptCount' => 2,
            'ClientId' => 'SomeTestApp',
            'Latency' => 555.55,
            'Timestamp' => 1527182299175,
            'Type' => 'ApiCall'
        ];
        $expected = '{"Api":"GetBucket","AttemptCount":2,"ClientId":"SomeTestApp",' .
            '"Latency":555.55,"Timestamp":1527182299175,"Type":"ApiCall"}';

        $this->assertSame($expected,
            $serializeEventData->invokeArgs($middleware, array($eventData)));
    }
}
