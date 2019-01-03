<?php

namespace Aws\Test\ClientSideMonitoring;

use Aws\ClientSideMonitoring\ApiCallMonitoringMiddleware;
use Aws\ClientSideMonitoring\Configuration;
use Aws\Command;
use Aws\Credentials\CredentialProvider;
use Aws\Credentials\Credentials;
use Aws\Exception\AwsException;
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
        $command = new Command('RunScheduledInstances', [
            'LaunchSpecification' => [
                'ImageId' => 'test-image',
            ],
            'ScheduledInstanceId' => 'test-instance-id',
            'InstanceCount' => 1,
        ]);

        $testBase = [
            ApiCallMonitoringMiddleware::wrap(
                $this->getCredentialProvider(),
                $this->getConfiguration(),
                'us-east-1',
                'ec2'
            ),
            $command,
            new Request(
                'POST',
                'http://foo.com',
                [
                    'User-Agent' => 'foo-agent'
                ]
            )
        ];
        $eventBase = [
            'Api' => 'RunScheduledInstances',
            'ClientId' => 'AwsPhpSdkTestApp',
            'Region' => 'us-east-1',
            'Type' => 'ApiCall',
            'Service' => 'ec2',
            'UserAgent' => 'foo-agent ' . \Aws\default_user_agent(),
            'Version' => 1,
            'MaxRetriesExceeded' => 0,
        ];

        $awsException = new AwsException(
            'AwsException that does not exceed max number of retries!',
            $command
        );
        $awsException->appendMonitoringEvent([
            'Type' => 'ApiCallAttempt',
        ]);
        $retriesException = new AwsException(
            'AwsException that exceeds max number of retries!',
            $command
        );
        $retriesException->setMaxRetriesExceeded();

        // Test API call event capturing final AwsException data
        $finalAwsException = new AwsException('FinalExceptionMessage', $command);
        $finalAwsException->appendMonitoringEvent([
            'Type' => 'ApiCallAttempt',
            'HttpStatusCode' => 421,
            'AwsException' => 'FirstException',
            'AwsExceptionMessage' => 'FirstExceptionMessage'
        ]);
        $finalAwsException->appendMonitoringEvent([
            'Type' => 'ApiCallAttempt',
            'HttpStatusCode' => 503,
            'AwsException' => 'FinalException',
            'AwsExceptionMessage' => 'FinalExceptionMessage'
        ]);

        // Test API call event capturing final SdkException data
        $finalSdkException = new AwsException('FinalExceptionMessage', $command);
        $finalSdkException->appendMonitoringEvent([
            'Type' => 'ApiCallAttempt',
            'HttpStatusCode' => 421,
            'SdkException' => 'FirstException',
            'SdkExceptionMessage' => 'FirstExceptionMessage'
        ]);
        $finalSdkException->appendMonitoringEvent([
            'Type' => 'ApiCallAttempt',
            'HttpStatusCode' => 503,
            'SdkException' => 'FinalException',
            'SdkExceptionMessage' => 'FinalExceptionMessage'
        ]);

        return [
            array_merge($testBase, [
                [],
                $eventBase
            ]),
            array_merge($testBase, [
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
                    'AttemptCount' => 2,
                ])
            ]),
            array_merge($testBase, [
                $awsException,
                array_merge($eventBase, [
                    'ClientId' => 'AwsPhpSdkTestApp',
                    'AttemptCount' => 1,
                ])
            ]),
            array_merge($testBase, [
                $retriesException,
                array_merge($eventBase, [
                    'ClientId' => 'AwsPhpSdkTestApp',
                    'MaxRetriesExceeded' => 1,
                ])
            ]),
            array_merge($testBase, [
                $finalAwsException,
                array_merge($eventBase, [
                    'FinalHttpStatusCode' => 503,
                    'FinalAwsException' => 'FinalException',
                    'FinalAwsExceptionMessage' => 'FinalExceptionMessage'
                ])
            ]),
            array_merge($testBase, [
                $finalSdkException,
                array_merge($eventBase, [
                    'FinalHttpStatusCode' => 503,
                    'FinalSdkException' => 'FinalException',
                    'FinalSdkExceptionMessage' => 'FinalExceptionMessage'
                ])
            ]),
        ];
    }
}
