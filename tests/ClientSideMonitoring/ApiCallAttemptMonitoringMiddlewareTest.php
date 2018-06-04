<?php

namespace Aws\Test\ClientSideMonitoring;

use Aws\ClientSideMonitoring\ApiCallAttemptMonitoringMiddleware;
use Aws\ClientSideMonitoring\Configuration;
use Aws\Command;
use Aws\Credentials\CredentialProvider;
use Aws\Credentials\Credentials;
use Aws\Exception\AwsException;
use Aws\HandlerList;
use Aws\Result;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\ClientSideMonitoring\ApiCallAttemptMonitoringMiddleware
 * @covers \Aws\ClientSideMonitoring\AbstractMonitoringMiddleware
 */
class ApiCallAttemptMonitoringMiddlewareTest extends TestCase
{

    protected function getConfiguration()
    {
        return new Configuration(true, 31000, 'AwsPhpSdkTestApp');
    }

    protected function getCredentialProvider()
    {
        return CredentialProvider::fromCredentials(
            new Credentials('testkey', 'testsecret', 'testtoken')
        );
    }

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

    protected function getResponse($promise)
    {
        $this->resetMiddlewareSocket();
        $list = new HandlerList();
        $list->setHandler(function ($command, $request) use ($promise) {
            return $promise;
        });

        $list->appendSign(ApiCallAttemptMonitoringMiddleware::wrap(
            $this->getCredentialProvider(),
            $this->getConfiguration(),
            'us-east-1',
            'ec2'
        ));
        $handler = $list->resolve();

        return $handler($this->getTestCommand(),
            new Request('POST', 'http://foo.com/bar/baz'))->wait();
    }

    protected function getTestCommand()
    {
        return new Command('RunScheduledInstances', [
            'LaunchSpecification' => [
                'ImageId' => 'test-image',
            ],
            'ScheduledInstanceId' => 'test-instance-id',
            'InstanceCount' => 1,
        ]);
    }

    protected function resetMiddlewareSocket()
    {
        $prepareSocket = $this->getMethod('prepareSocket');
        $middleware = new ApiCallAttemptMonitoringMiddleware(function(){},
            $this->getCredentialProvider(),
            $this->getConfiguration(),
            'test',
            'test');
        $prepareSocket->invokeArgs($middleware, array(true));
    }

    public function testPopulatesMonitoringData()
    {
        $promise = Promise\promise_for(new Result([
            '@metadata' => [
                'statusCode' => 200,
                'headers' => [
                    'x-amz-request-id' => 'testrequestid1',
                    'x-amzn-RequestId' => 'testrequestid2',
                    'x-amz-id-2' => 'testamzid'
                ]
            ]
        ]));
        $response = $this->getResponse($promise);

        $this->assertArraySubset(
            [
                'AccessKey' => 'testkey',
                'Api' => 'RunScheduledInstances',
                'ClientId' => 'AwsPhpSdkTestApp',
                'Fqdn' => 'foo.com',
                'HttpStatusCode' => 200,
                'Region' => 'us-east-1',
                'Type' => 'ApiCallAttempt',
                'Service' => 'ec2',
                'XAmzRequestId' => 'testrequestid1',
                'XAmznRequestId' => 'testrequestid2',
                'XAmzId2' => 'testamzid'
            ],
            $response['@monitoringEvents'][0]
        );
    }

    public function testPopulatesAwsExceptionData()
    {
        $message = 'This is a test exception message!';
        $code = str_repeat('a', 300);
        $promise = Promise\rejection_for(new AwsException(
            $message,
            $this->getTestCommand(),
            [
                'message' => $message,
                'code' => $code,
                'response' => new Response(405)
            ]
        ));
        try {
            $this->getResponse($promise);
            $this->fail('Exception occurred.');
        } catch (\Exception $response) {
            $events = $response->getMonitoringEvents();

            $this->assertArraySubset(
                [
                    'AwsException' => str_repeat('a', 128),
                    'AwsExceptionMessage' => $message,
                    'HttpStatusCode' => 405
                ],
                $events[0]
            );
            $this->assertEquals(128, strlen($events[0]['AwsException']));
        }
    }
}
