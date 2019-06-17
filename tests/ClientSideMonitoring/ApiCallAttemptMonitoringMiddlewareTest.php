<?php

namespace Aws\Test\ClientSideMonitoring;

use Aws\Api\Parser\Exception\ParserException;
use Aws\ClientSideMonitoring\ApiCallAttemptMonitoringMiddleware;
use Aws\ClientSideMonitoring\Configuration;
use Aws\Command;
use Aws\Credentials\CredentialProvider;
use Aws\Credentials\Credentials;
use Aws\Exception\AwsException;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\ClientSideMonitoring\ApiCallAttemptMonitoringMiddleware
 * @covers \Aws\ClientSideMonitoring\AbstractMonitoringMiddleware
 */
class ApiCallAttemptMonitoringMiddlewareTest extends TestCase
{
    use MonitoringMiddlewareTestingTrait;

    protected function getConfiguration()
    {
        return new Configuration(true, '127.0.0.1', 31000, 'AwsPhpSdkTestApp');
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
            ApiCallAttemptMonitoringMiddleware::wrap(
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
            ),
        ];

        $headers = [
            'x-amz-request-id' => 'testrequestid1',
            'x-amzn-RequestId' => 'testrequestid2',
            'x-amz-id-2' => 'testamzid',
        ];
        $stats = [
            'http' => [
                [
                    'total_time' => .12,
                    'primary_ip' => '12.34.56.78',
                    'namelookup_time' => .012,
                ],
            ]
        ];
        $fullResult = [
            '@metadata' => [
                'statusCode' => 200,
                'headers' => $headers,
                'transferStats' => $stats,
            ],
        ];

        $eventBase = [
            'AccessKey' => 'testkey',
            'Api' => 'RunScheduledInstances',
            'ClientId' => 'AwsPhpSdkTestApp',
            'Fqdn' => 'foo.com',
            'Region' => 'us-east-1',
            'Service' => 'ec2',
            'SessionToken' => 'testtoken',
            'Type' => 'ApiCallAttempt',
            'UserAgent' => 'foo-agent ' . \Aws\default_user_agent(),
            'Version' => 1,
        ];
        $eventStatsPartial = [
            'AttemptLatency' => 120,
            'DestinationIp' => '12.34.56.78',
            'DnsLatency' => 12,
        ];
        $eventHeadersPartial = [
            'XAmzRequestId' => 'testrequestid1',
            'XAmznRequestId' => 'testrequestid2',
            'XAmzId2' => 'testamzid',
        ];

        $tests = [
            array_merge($testBase, [
                $fullResult,
                array_merge(
                    $eventBase,
                    $eventHeadersPartial,
                    $eventStatsPartial,
                    [
                        'HttpStatusCode' => 200,
                    ]
                )
            ]),
            array_merge($testBase, [
                [
                    '@metadata' => [
                        'statusCode' => 200,
                        'transferStats' => [
                            'http' => []
                        ],
                    ],
                ],
                array_merge(
                    $eventBase,
                    [
                        'HttpStatusCode' => 200,
                    ]
                )
            ]),
        ];

        $maxLength = 128;

        $message = 'This is a test exception message!';
        $code = str_repeat('a', 2 * $maxLength);
        $exceptionContext = [
            'message' => $message,
            'code' => $code,
        ];
        $eventAwsException = array_merge(
            $eventBase,
            [
                'AwsException' => str_repeat('a', $maxLength),
                'AwsExceptionMessage' => $message,
            ]
        );

        $tests []= array_merge($testBase, [
            new AwsException(
                $message,
                $command,
                array_merge($exceptionContext, [
                    'response' => new Response(405, $headers),
                    'result' => $fullResult,
                    'transfer_stats' => $stats['http'][0],
                ])
            ),
            array_merge(
                $eventAwsException,
                $eventHeadersPartial,
                $eventStatsPartial,
                [
                    'HttpStatusCode' => 405,
                ]
            ),
        ]);
        $tests []= array_merge($testBase, [
            new ParserException(
                $message,
                0,
                null,
                ['response' => new Response(200, $headers)]
            ),
            array_merge(
                $eventBase,
                $eventHeadersPartial,
                [
                    'HttpStatusCode' => 200,
                    'SdkException' => ParserException::class,
                    'SdkExceptionMessage' => $message,
                ]
            ),
        ]);
        $tests []= array_merge($testBase, [
            new AwsException(
                $message,
                $command,
                array_merge($exceptionContext, [
                    'response' => new Response(405)
                ])
            ),
            array_merge(
                $eventAwsException,
                [
                    'HttpStatusCode' => 405,
                ]
            )
        ]);
        $tests []= array_merge($testBase, [
            new AwsException(
                $message,
                $command,
                $exceptionContext
            ),
            $eventAwsException
        ]);

        return $tests;
    }

    public function testDisablesMiddlewareForUnwrapErrors()
    {
        $middleware = new ApiCallAttemptMonitoringMiddleware(
            function() {},
            $this->getCredentialProvider(),
            function() {
                throw new \Exception('Test exception');
            },
            'us-east-1',
            'ec2'
        );
        $ref = new \ReflectionClass(ApiCallAttemptMonitoringMiddleware::class);
        $method = $ref->getMethod('isEnabled');
        $method->setAccessible(true);
        $this->assertEquals(false, $method->invoke($middleware));
    }
}
