<?php

namespace Aws\Test\ClientSideMonitoring;

use Aws\ClientSideMonitoring\ApiCallMonitoringMiddleware;
use Aws\ClientSideMonitoring\Configuration;
use Aws\Command;
use Aws\Credentials\CredentialProvider;
use Aws\Credentials\Credentials;
use Aws\HandlerList;
use Aws\MonitoringEventsInterface;
use Aws\Result;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\ClientSideMonitoring\ApiCallMonitoringMiddleware
 * @covers \Aws\ClientSideMonitoring\AbstractMonitoringMiddleware
 */
class ApiCallMonitoringMiddlewareTest extends TestCase
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
        $class = new \ReflectionClass('Aws\ClientSideMonitoring\ApiCallMonitoringMiddleware');
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }

    protected function resetMiddlewareSocket()
    {
        $prepareSocket = $this->getMethod('prepareSocket');
        $middleware = new ApiCallMonitoringMiddleware(function(){},
            $this->getCredentialProvider(),
            $this->getConfiguration(),
            'test',
            'test');
        $prepareSocket->invokeArgs($middleware, array(true));
    }

    public function getMonitoringDataTests()
    {
        $command = new Command('RunScheduledInstances', [
            'LaunchSpecification' => [
                'ImageId' => 'test-image',
            ],
            'ScheduledInstanceId' => 'test-instance-id',
            'InstanceCount' => 1,
        ]);
        return [
            [
                $command,
                [],
                [
                    'Api' => 'RunScheduledInstances',
                    'ClientId' => 'AwsPhpSdkTestApp',
                    'Type' => 'ApiCall',
                    'Service' => 'ec2',
                    'Version' => 1,
                ]
            ],
            [
                $command,
                [
                    '@metadata' => [
                        'transferStats' => [
                            'http' => [
                                [],
                                [],
                            ],
                        ],
                    ],
                ],
                [
                    'Api' => 'RunScheduledInstances',
                    'AttemptCount' => 2,
                    'ClientId' => 'AwsPhpSdkTestApp',
                    'Type' => 'ApiCall',
                    'Service' => 'ec2',
                    'Version' => 1,
                ]
            ],
        ];
    }

    /**
     * @dataProvider getMonitoringDataTests
     */
    public function testPopulatesMonitoringData($command, $result, $expected)
    {
        $this->resetMiddlewareSocket();
        $called = false;

        $list = new HandlerList();
        $list->setHandler(function ($command, $request) use ($result, &$called) {
            $called = true;
            return Promise\promise_for(new Result($result));
        });
        $list->appendBuild(ApiCallMonitoringMiddleware::wrap(
            $this->getCredentialProvider(),
            $this->getConfiguration(),
            'us-east-1',
            'ec2'
        ));
        $handler = $list->resolve();

        /** @var MonitoringEventsInterface $response */
        $response = $handler($command, new Request('POST', 'http://foo.com'))->wait();
        $this->assertTrue($called);
        $eventData = $response->getMonitoringEvents()[0];
        $this->assertArraySubset($expected, $eventData);
        $this->assertInternalType('int', $eventData['Timestamp']);
    }
}
