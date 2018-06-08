<?php

namespace Aws\Test\ClientSideMonitoring;

use Aws\ClientSideMonitoring\ApiCallMonitoringMiddleware;
use Aws\ClientSideMonitoring\Configuration;
use Aws\Command;
use Aws\Credentials\CredentialProvider;
use Aws\Credentials\Credentials;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\ClientSideMonitoring\ApiCallMonitoringMiddleware
 * @covers \Aws\ClientSideMonitoring\AbstractMonitoringMiddleware
 */
class ApiCallMonitoringMiddlewareTest extends TestCase
{
    use MonitoringMiddlewareTestingTrait;

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
        $baseTest = [
            ApiCallMonitoringMiddleware::wrap(
                $this->getCredentialProvider(),
                $this->getConfiguration(),
                'us-east-1',
                'ec2'
            ),
            new Command('RunScheduledInstances', [
                'LaunchSpecification' => [
                    'ImageId' => 'test-image',
                ],
                'ScheduledInstanceId' => 'test-instance-id',
                'InstanceCount' => 1,
            ]),
            new Request('POST', 'http://foo.com')
        ];
        $eventBase = [
            'Api' => 'RunScheduledInstances',
            'ClientId' => 'AwsPhpSdkTestApp',
            'Type' => 'ApiCall',
            'Service' => 'ec2',
            'Version' => 1,
        ];

        return [
            array_merge($baseTest, [
                [],
                $eventBase
            ]),
            array_merge($baseTest, [
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
                array_merge($eventBase, [
                    'ClientId' => 'AwsPhpSdkTestApp',
                ])
            ]),
        ];
    }
}
