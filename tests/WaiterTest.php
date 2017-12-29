<?php
namespace Aws\Test;

use Aws\Api\ApiProvider;
use Aws\CommandInterface;
use Aws\DynamoDb\DynamoDbClient;
use Aws\Exception\AwsException;
use Aws\Result;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\RejectedPromise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7;
use Psr\Http\Message\RequestInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Waiter
 */
class WaiterTest extends TestCase
{
    use UsesServiceTrait;

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testErrorOnBadConfig()
    {
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

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testErrorOnBadBeforeCallback()
    {
        $client = $this->getTestClient('DynamoDb');
        $client->waitUntil(
            'TableExists',
            [
                'TableName' => 'Meh',
                '@waiter' => ['before' => '%']
            ]
        );
    }

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
                        Psr7\stream_for('{"Table":{"TableStatus":"ACTIVE"}}')
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
                Psr7\stream_for(sprintf(
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

        $this->assertEquals(4, $iteration, 'Did not execute enough requests.');
        $this->assertEquals(6000, $waitTime, 'Did not delay long enough.');
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

        $this->assertEquals(count($results), $actualAttempt);
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
        $waiter = new \ReflectionClass('Aws\Waiter');
        $matcher = $waiter->getMethod($matcher);
        $matcher->setAccessible(true);
        $waiter = $waiter->newInstanceWithoutConstructor();

        $this->assertEquals($expected, $matcher->invoke($waiter, $result, $acceptor));
    }

    public function getMatchersTestCases()
    {
        return [
            [
                'matchesPath',
                null,
                [],
                false
            ],
            [
                'matchesPath',
                $this->getMockResult(['a' => ['b' => 'c']]),
                ['argument' => 'a.b', 'expected' => 'c'],
                true
            ],
            [
                'matchesPath',
                $this->getMockResult(['a' => ['b' => 'c']]),
                ['argument' => 'a', 'expected' => 'z'],
                false
            ],
            [
                'matchesPathAll',
                null,
                [],
                false
            ],
            [
                'matchesPathAll',
                $this->getMockResult([
                    'a' => [
                        ['b' => 'c'],
                        ['b' => 'c'],
                        ['b' => 'c']
                    ]
                ]),
                ['argument' => 'a[].b', 'expected' => 'c'],
                true
            ],
            [
                'matchesPathAll',
                $this->getMockResult(['a' => [
                    ['b' => 'c'],
                    ['b' => 'z'],
                    ['b' => 'c']
                ]]),
                ['argument' => 'a[].b', 'expected' => 'c'],
                false
            ],
            [
                'matchesPathAny',
                null,
                [],
                false
            ],
            [
                'matchesPathAny',
                $this->getMockResult([
                    'a' => [
                        ['b' => 'c'],
                        ['b' => 'd'],
                        ['b' => 'e']
                    ]
                ]),
                ['argument' => 'a[].b', 'expected' => 'c'],
                true
            ],
            [
                'matchesPathAny',
                $this->getMockResult([
                    'a' => [
                        ['b' => 'x'],
                        ['b' => 'y'],
                        ['b' => 'z']
                    ]
                ]),
                ['argument' => 'a[].b', 'expected' => 'c'],
                false
            ],
            [
                'matchesStatus',
                null,
                [],
                false
            ],
            [
                'matchesStatus',
                $this->getMockResult(),
                ['expected' => 200],
                true
            ],
            [
                'matchesStatus',
                $this->getMockResult(),
                ['expected' => 400],
                false
            ],
            [
                'matchesError',
                null,
                [],
                false
            ],
            [
                'matchesError',
                $this->getMockResult('InvalidData'),
                ['expected' => 'InvalidData'],
                true
            ],
            [
                'matchesError',
                $this->getMockResult('InvalidData'),
                ['expected' => 'Foo'],
                false
            ],
        ];
    }

    private function getMockResult($data = [])
    {
        if (is_string($data)) {
            return new AwsException('ERROR',
                $this->getMockBuilder('Aws\CommandInterface')->getMock(),
                [
                    'code'   => $data,
                    'result' => new Result(['@metadata' => ['statusCode' => 200]])
                ]
            );
        }

        return new Result($data + ['@metadata' => ['statusCode' => 200]]);
    }
}
