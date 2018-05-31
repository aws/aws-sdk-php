<?php

namespace Aws\ClientSideMonitoring;

use Aws\Api\ApiProvider;
use Aws\Api\Service;
use Aws\Command;
use Aws\Credentials\CredentialProvider;
use Aws\Credentials\Credentials;
use Aws\HandlerList;
use Aws\Result;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;

/**
 * @covers ApiCallAttemptMonitoringMiddleware
 * @covers AbstractMonitoringMiddleware
 */
class ApiCallAttemptMonitoringMiddlewareTest extends TestCase
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
        $class = new \ReflectionClass('Aws\ClientSideMonitoring\ApiCallAttemptMonitoringMiddleware');
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }

    public function testPopulatesMonitoringData()
    {
        $list = new HandlerList();
        $list->setHandler(function ($command, $request) use (&$called) {
            $called = true;
            return Promise\promise_for(new Result([
                '@metadata' => [
                    'statusCode' => 200,
                    'headers' => [
                        'x-amz-request-id' => 'testrequestid1',
                        'x-amzn-RequestId' => 'testrequestid2',
                        'x-amz-id-2' => 'testamzid'
                    ]
                ]
            ]));
        });

        $credentialProvider = CredentialProvider::fromCredentials(
            new Credentials('testkey', 'testsecret', 'testtoken')
        );
        $list->appendSign(ApiCallAttemptMonitoringMiddleware::wrap(
            $credentialProvider,
            [
                'enabled' => true,
                'port' => 31000
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
        ]), new Request('POST', 'http://foo.com/bar/baz'))->wait();
        $this->assertTrue($called);
        $this->assertEquals(
            'RunScheduledInstances',
            $response['@monitoringEvents'][0]['Api']
        );
        $this->assertEquals(
            200,
            $response['@monitoringEvents'][0]['HttpStatusCode']);
        $this->assertEquals(
            'foo.com',
            $response['@monitoringEvents'][0]['Fqdn']);
        $this->assertEquals(
            'us-east-1',
            $response['@monitoringEvents'][0]['Region']
        );
        $this->assertEquals(
            'ApiCallAttempt',
            $response['@monitoringEvents'][0]['Type']
        );
        $this->assertEquals(
            'ec2',
            $response['@monitoringEvents'][0]['Service']
        );
        $this->assertEquals(
            'testrequestid1',
            $response['@monitoringEvents'][0]['XAmzRequestId']
        );
        $this->assertEquals(
            'testrequestid2',
            $response['@monitoringEvents'][0]['XAmznRequestId']
        );
        $this->assertEquals(
            'testamzid',
            $response['@monitoringEvents'][0]['XAmzId2']
        );
        $this->assertEquals(
            'testkey',
            $response['@monitoringEvents'][0]['AccessKey']
        );
    }

    public function testSerializesData()
    {
        $serializeEventData = $this->getMethod('serializeEventData');
        $middleware = new ApiCallAttemptMonitoringMiddleware(function(){}, function(){}, [], 'test', 'test');
        $eventData = [
            'AwsException' => str_repeat('a', 300),
            'AttemptLatency' => 314.15,
            'Fqdn' => 's3-eu-west-1.amazonaws.com',
            'HttpStatusCode' => 200,
            'UserAgent' => 'Test User Agent With Spaces'
        ];
        $awsExceptionMax = $middleware::getDataConfiguration()['AwsException']['maxLength'];
        $expected = '{"AwsException":"' . substr($eventData['AwsException'], 0, $awsExceptionMax) .
            '","AttemptLatency":314.15,"Fqdn":"s3-eu-west-1.amazonaws.com",' .
            '"HttpStatusCode":200,"UserAgent":"Test User Agent With Spaces"}';

        $this->assertSame($expected,
            $serializeEventData->invokeArgs($middleware, array($eventData)));
    }
}
