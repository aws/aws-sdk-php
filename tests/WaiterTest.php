<?php
namespace Aws\Test;

use Aws\Api\ApiProvider;
use Aws\AwsClientInterface;
use Aws\CommandInterface;
use Aws\DynamoDb\DynamoDbClient;
use Aws\Exception\AwsException;
use Aws\MetricsBuilder;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\Waiter;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\RejectedPromise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7;
use Psr\Http\Message\RequestInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\Waiter
 */
class WaiterTest extends TestCase
{
    use UsesServiceTrait;
    use MetricsBuilderTestTrait;

    public function testErrorOnBadConfig()
    {
        $this->expectException(\InvalidArgumentException::class);
        $provider = ApiProvider::defaultProvider();
        $client = new DynamoDbClient([
            'region' => 'foo',
            'version' => 'latest',
            'api_provider' => function ($type, $service, $version) use ($provider) {
                return $type === 'waiter'
                    ? ['waiters' => ['TableExists' => []]]
                    : $provider($type, $service, $version);
            }
        ]);
        $client->waitUntil(
            'TableExists',
            ['TableName' => 'Meh']
        );
    }

    public function testErrorOnBadBeforeCallback()
    {
        $this->expectException(\InvalidArgumentException::class);
        $client = $this->getTestClient('DynamoDb');
        $client->waitUntil(
            'TableExists',
            [
                'TableName' => 'Meh',
                '@waiter' => ['before' => '%']
            ]
        );
    }

    /** @doesNotPerformAssertions */
    public function testContinueWaitingOnHandlerError()
    {
        $retries = 10;
        $client = new DynamoDbClient([
            'version' => 'latest',
            'region' => 'us-west-2',
            'retries' => 0,
            'http_handler' => function (
                RequestInterface $request,
                array $options
            ) use (&$retries) {
                if (0 === --$retries) {
                    return new FulfilledPromise(new Response(200, [],
                        Psr7\Utils::streamFor('{"Table":{"TableStatus":"ACTIVE"}}')
                    ));
                }

                return new RejectedPromise([
                    'connection_error' => true,
                    'exception' => $this->getMockBuilder(ConnectException::class)
                        ->disableOriginalConstructor()
                        ->getMock(),
                    'response' => null,
                ]);
            },
        ]);

        $client->waitUntil('TableExists', [
            'TableName' => 'table',
        ]);
    }

    /** @doesNotPerformAssertions */
    public function testCanCancel()
    {
        $client = $this->getTestClient('DynamoDb');
        $this->addMockResults($client, [new Result([])]);
        $client->getWaiter('TableExists', [
            'TableName' => 'Meh',
            '@http' => ['debug' => true]
        ])->promise()->cancel();
        sleep(1);
    }

    public function testCanWait()
    {
        $iteration = $waitTime = 0;
        $statusQueue = ['CREATING', 'CREATING', 'CREATING', 'ACTIVE'];
        $handler = static function (Request $request, array $options) use (
            $statusQueue, &$waitTime, &$iteration
        ) {
            $waitTime += $options['delay'];

            $promise = new Promise\Promise();
            $promise->resolve(new Response(200, [],
                Psr7\Utils::streamFor(sprintf(
                    '{"Table":{"TableStatus":"%s"}}',
                    $statusQueue[$iteration]
                ))
            ));
            $iteration++;

            return $promise;
        };

        $client = $this->getTestClient('DynamoDb', [
            'http_handler' => $handler,
        ]);

        $client->waitUntil(
            'TableExists',
            [
                'TableName' => 'Meh',
                '@waiter' => [
                    'initDelay' => 3,
                    'delay'     => 1
                ]
            ]
        );

        $this->assertSame(4, $iteration, 'Did not execute enough requests.');
        $this->assertSame(6000, $waitTime, 'Did not delay long enough.');
    }

    /**
     * @dataProvider getWaiterWorkflowTestCases
     */
    public function testWaiterWorkflow($results, $expectedException)
    {
        // Prepare a client
        $client = $this->getTestClient('DynamoDb', [
            'api_provider' => $this->getApiProvider()
        ]);
        $this->addMockResults($client, $results);

        // Execute the waiter and verify the number of requests.
        $actualAttempt = 0;
        try {
            $client->waitUntil('TableExists', [
                'TableName' => 'WhoCares',
                '@waiter'    => [
                    'before' => function (CommandInterface $cmd, $attempt)
                    use (&$actualAttempt) {
                        $actualAttempt = $attempt;
                    }
                ]
            ]);
            $actualException = null;
        } catch (\Exception $e) {
            $actualException = $e->getMessage();
        }

        $this->assertCount($actualAttempt, $results);
        $this->assertEquals($expectedException, $actualException);
    }

    public function getWaiterWorkflowTestCases()
    {
        return [
            [
                [
                    $this->createMockAwsException('ResourceNotFoundException'),
                    new Result(['Table' => ['TableStatus' => 'CREATING']]),
                    new Result(['Table' => ['TableStatus' => 'CREATING']]),
                    new Result(['Table' => ['TableStatus' => 'ACTIVE']]),
                ],
                null
            ],
            [
                [
                    new Result(['Table' => ['TableStatus' => 'CREATING']]),
                    new Result(['Table' => ['TableStatus' => 'DELETING']]),
                ],
                'The TableExists waiter entered a failure state.'
            ],
            [
                [
                    new Result(['Table' => ['TableStatus' => 'CREATING']]),
                    new Result(['Table' => ['TableStatus' => 'CREATING']]),
                    new Result(['Table' => ['TableStatus' => 'CREATING']]),
                    new Result(['Table' => ['TableStatus' => 'CREATING']]),
                    new Result(['Table' => ['TableStatus' => 'CREATING']]),
                ],
                'The TableExists waiter failed after attempt #5.'
            ],
            [
                [
                    $this->createMockAwsException(null, null, 'foo'),
                ],
                'The TableExists waiter entered a failure state. Reason: foo'
            ],
        ];
    }

    private function getApiProvider()
    {
        return function ($type) {
            if ($type == 'api') {
                return [
                    'operations' => ['DescribeTable' => ['input' => []]],
                    'metadata' => [
                        'endpointPrefix' => 'foo',
                        'protocol' => 'json',
                        'jsonVersion' => '1.1',
                        'signatureVersion' => 'v4'
                    ],
                ];
            }

            return ['waiters' => [
                'TableExists' =>  [
                    'delay' => function ($attempt) { return $attempt; },
                    'maxAttempts' => 5,
                    'operation' => 'DescribeTable',
                    'acceptors' => [
                        [
                            'state' => 'success',
                            'matcher' => 'path',
                            'argument' => 'Table.TableStatus',
                            'expected' => 'ACTIVE',
                        ],
                        [
                            'state' => 'retry',
                            'matcher' => 'error',
                            'expected' => 'ResourceNotFoundException',
                        ],
                        [
                            'state' => 'failed',
                            'matcher' => 'path',
                            'argument' => 'Table.TableStatus',
                            'expected' => 'DELETING',
                        ],
                    ],
                ]
            ]];
        };
    }

    /**
     * @dataProvider getMatchersTestCases
     */
    public function testMatchers($matcher, $result, $acceptor, $expected)
    {
        $waiter = new \ReflectionClass(Waiter::class);
        $matcher = $waiter->getMethod($matcher);
        $matcher->setAccessible(true);
        $waiter = $waiter->newInstanceWithoutConstructor();

        $this->assertEquals($expected, $matcher->invoke($waiter, $result, $acceptor));
    }

    /**
     * @return array
     */
    public function getMatchersTestCases(): array
    {
        return [
            'matches_path_1' => [
                'matcher' => 'matchesPath',
                'result' => null,
                'acceptor' => [],
                'expected' => false
            ],
            'matches_path_2' => [
                'matcher' => 'matchesPath',
                'result' => $this->getMockResult(['a' => ['b' => 'c']]),
                'acceptor' => ['argument' => 'a.b', 'expected' => 'c'],
                'expected' => true
            ],
            'matches_path_3' => [
                'matcher' => 'matchesPath',
                'result' => $this->getMockResult(['a' => ['b' => 'c']]),
                'acceptor' => ['argument' => 'a', 'expected' => 'z'],
                'expected' => false
            ],
            'matches_path_4_same_value_different_type' => [
                'matcher' => 'matchesPath',
                'result' => $this->getMockResult(['a' => ['b' => 'false']]),
                'acceptor' => ['argument' => 'a.b', 'expected' => false],
                'expected' => false
            ],
            'matches_path_5_same_value_same_type' => [
                'matcher' => 'matchesPath',
                'result' => $this->getMockResult(['a' => ['b' => false]]),
                'acceptor' => ['argument' => 'a.b', 'expected' => false],
                'expected' => true
            ],
            'matches_path_6_same_value_same_type' => [
                'matcher' => 'matchesPath',
                'result' => $this->getMockResult(['a' => ['b' => 'false']]),
                'acceptor' => ['argument' => 'a.b', 'expected' => 'false'],
                'expected' => true
            ],
            'matches_path_all_1' => [
                'matcher' => 'matchesPathAll',
                'result' => null,
                'acceptor' => [],
                'expected' => false,
            ],
            'matches_path_all_2' => [
                'matcher' => 'matchesPathAll',
                'result' =>  $this->getMockResult([
                    'a' => [
                        ['b' => 'c'],
                        ['b' => 'c'],
                        ['b' => 'c']
                    ]
                ]),
                'acceptor' => ['argument' => 'a[].b', 'expected' => 'c'],
                'expected' => true,
            ],
            'matches_path_all_3' => [
                'matcher' => 'matchesPathAll',
                'result' =>  $this->getMockResult(['a' => [
                    ['b' => 'c'],
                    ['b' => 'z'],
                    ['b' => 'c']
                ]]),
                'acceptor' => ['argument' => 'a[].b', 'expected' => 'c'],
                'expected' => false,
            ],
            'matches_path_all_4_empty_array_as_result' => [
                'matcher' => 'matchesPathAll',
                'result' =>  $this->getMockResult(),
                'acceptor' => ['argument' => 'a', 'expected' => 'c'],
                'expected' => false,
            ],
            'matches_path_all_4_non_array_value_as_result' => [
                'matcher' => 'matchesPathAll',
                'result' =>  $this->getMockResult(['a' => 'FooValue']),
                'acceptor' => ['argument' => 'a[].b', 'expected' => 'c'],
                'expected' => false,
            ],
            'matches_path_any_1' => [
                'matcher' => 'matchesPathAny',
                'result' =>  null,
                'acceptor' => [],
                'expected' => false,
            ],
            'matches_path_any_2' => [
                'matcher' => 'matchesPathAny',
                'result' =>  $this->getMockResult([
                    'a' => [
                        ['b' => 'c'],
                        ['b' => 'd'],
                        ['b' => 'e']
                    ]
                ]),
                'acceptor' => ['argument' => 'a[].b', 'expected' => 'c'],
                'expected' => true,
            ],
            'matches_path_any_3' => [
                'matcher' => 'matchesPathAny',
                'result' =>  $this->getMockResult([
                    'a' => [
                        ['b' => 'x'],
                        ['b' => 'y'],
                        ['b' => 'z']
                    ]
                ]),
                'acceptor' => ['argument' => 'a[].b', 'expected' => 'c'],
                'expected' => false,
            ],
            'matches_path_any_4_empty_array_as_result' => [
                'matcher' => 'matchesPathAny',
                'result' =>  $this->getMockResult(),
                'acceptor' => ['argument' => 'a', 'expected' => 'c'],
                'expected' => false,
            ],
            'matches_path_any_5_non_array_value_as_result' => [
                'matcher' => 'matchesPathAll',
                'result' =>  $this->getMockResult(['a' => 'FooValue']),
                'acceptor' => ['argument' => 'a[].b', 'expected' => 'c'],
                'expected' => false,
            ],
            'matches_status_1' => [
                'matcher' => 'matchesStatus',
                'result' =>  null,
                'acceptor' => [],
                'expected' => false,
            ],
            'matches_status_2' => [
                'matcher' => 'matchesStatus',
                'result' =>  $this->getMockResult(),
                'acceptor' => ['expected' => 200],
                'expected' => true,
            ],
            'matches_status_3' => [
                'matcher' => 'matchesStatus',
                'result' =>  $this->getMockResult(),
                'acceptor' => ['expected' => 400],
                'expected' => false,
            ],
            'matches_error_1' => [
                'matcher' => 'matchesError',
                'result' =>  null,
                'acceptor' => [],
                'expected' => false,
            ],
            'matches_error_2' => [
                'matcher' => 'matchesError',
                'result' =>  $this->getMockResult('InvalidData'),
                'acceptor' => ['expected' => 'InvalidData'],
                'expected' => true,
            ],
            'matches_error_3' => [
                'matcher' => 'matchesError',
                'result' =>  $this->getMockResult('InvalidData'),
                'acceptor' => ['expected' => 'Foo'],
                'expected' => false,
            ],
        ];
    }

    private function getMockResult($data = [])
    {
        if (is_string($data)) {
            return new AwsException('ERROR',
                $this->getMockBuilder(CommandInterface::class)->getMock(),
                [
                    'code'   => $data,
                    'result' => new Result(['@metadata' => ['statusCode' => 200]])
                ]
            );
        }

        return new Result($data + ['@metadata' => ['statusCode' => 200]]);
    }


    /**
     * Tests the waiter expects not error.
     * This means the operation should succeed.
     *
     * @return void
     */
    public function testWaiterMatcherExpectNoError(): void
    {
        $client = new S3Client([
            'region' => 'us-east-2',
            'http_handler' => function (RequestInterface $_) {
                $responseBody = <<<EOXML
<?xml version="1.0" encoding="UTF-8"?><Operation></Operation>
EOXML;
                return new Response(200, [], $responseBody);
            }
        ]);
        $commandArgs = [
            'Bucket' => 'fuzz',
            'Key' => 'bazz'
        ];
        $acceptors = [
            [
                'expected' => false,
                'matcher' => 'error',
                'state' => 'success'
            ]
        ];
        $waiter = $this->getTestWaiter(
            $acceptors,
            'headObject',
            $commandArgs,
            $client
        );
        $waiter->promise()
            ->then(function (CommandInterface $_) {
                $this->assertTrue(true); // Waiter succeeded
            })->wait();
    }

    /**
     * Tests the waiter should receive an error.
     * This means the operation should fail.
     *
     * @return void
     */
    public function testWaiterMatcherExpectsAnyError(): void
    {
        $client = new S3Client([
            'region' => 'us-east-2',
            'http_handler' => function (RequestInterface $request) {
                $responseBody = <<<EOXML
<?xml version="1.0" encoding="UTF-8"?><Operation></Operation>
EOXML;
                $response = new Response(200, [], $responseBody);
                return new RejectedPromise([
                    'connection_error' => true,
                    'exception' => new RequestException(
                        'Error',
                        $request,
                        $response
                    ),
                ]);
            }
        ]);
        $commandArgs = [
            'Bucket' => 'fuzz',
            'Key' => 'bazz'
        ];
        $acceptors = [
            [
                'expected' => true,
                'matcher' => 'error',
                'state' => 'success'
            ]
        ];
        $waiter = $this->getTestWaiter(
            $acceptors,
            'headObject',
            $commandArgs,
            $client
        );
        $waiter->promise()
            ->then(function (CommandInterface $_) {
                $this->assertTrue(true); // Waiter succeeded
            })->wait();
    }

    public function testAppendsMetricsCaptureMiddleware()
    {
        $client = new S3Client([
            'region' => 'us-east-2',
            'http_handler' => function (RequestInterface $request) {
                $this->assertTrue(
                    in_array(
                        MetricsBuilder::WAITER,
                        $this->getMetricsAsArray($request)
                    )
                );

                return new Response();
            }
        ]);
        $commandArgs = [
            'Bucket' => 'foo'
        ];
        $acceptors = [
            [
                'expected' => 200,
                'matcher' => 'status',
                'state' => 'success'
            ]
        ];
        $waiter = $this->getTestWaiter(
            $acceptors,
            'headBucket',
            $commandArgs,
            $client
        );
        $waiter->promise()->wait();
    }

    /**
     * Creates a test waiter.
     *
     * @param array $acceptors
     * @param string $operation
     * @param array $commandArgs
     * @param AwsClientInterface $client
     *
     * @return Waiter
     */
    private function getTestWaiter(
        array $acceptors,
        string $operation,
        array $commandArgs,
        AwsClientInterface $client
    ): Waiter
    {
        $waiterConfig = [
            'delay' => 5,
            'operation' => $operation,
            'maxAttempts' => 20,
            'acceptors' => $acceptors
        ];

        return new Waiter(
            $client,
            'waiter-' . $operation,
            $commandArgs,
            $waiterConfig
        );
    }
}
