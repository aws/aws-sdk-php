<?php
namespace Aws\Test;

use Aws\Exception\AwsException;
use Aws\Result;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Stream;

/**
 * @covers Aws\Waiter
 */
class WaiterTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testErrorOnBadConfig()
    {
        $client = $this->getTestClient('DynamoDb');
        $client->waitUntil(
            'TableExists',
            ['TableName' => 'Meh'],
            ['delay' => null]
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testErrorOnBadRetryCallback()
    {
        $client = $this->getTestClient('DynamoDb');
        $client->waitUntil(
            'TableExists',
            ['TableName' => 'Meh'],
            ['retry' => '%']
        );
    }

    public function testCanCancel()
    {
        $client = $this->getTestClient('DynamoDb');
        $this->addMockResults($client, [new Result([])]);
        $client->waitUntil('TableExists', [
            'TableName' => 'Meh',
            '@future' => true,
            '@http' => ['debug' => true]
        ])->cancel();
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

            $promise = new Promise();
            $promise->resolve(new Response(200, [],
                Stream::factory(sprintf(
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

        $result = $client->waitUntil(
            'TableExists',
            ['TableName' => 'Meh'],
            ['initDelay' => 3, 'delay' => 1]
        );

        $this->assertEquals(4, $iteration, 'Did not execute enough requests.');
        $this->assertEquals(6000, $waitTime, 'Did not delay long enough.');
        $this->assertInstanceOf('Aws\Result', $result);
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
            $client->waitUntil('TableExists', ['TableName' => 'WhoCares'], [
                'retry' => function ($attempt) use (&$actualAttempt) {
                    $actualAttempt = $attempt;
                }
            ]);
            $actualException = null;
        } catch (\Exception $e) {
            $actualException = $e->getMessage();
        }

        $this->assertEquals(count($results) - 1, $actualAttempt);
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
            } else {
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
            }
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
            return new AwsException('ERROR', $this->getMock('Aws\CommandInterface'), [
                'code'   => $data,
                'result' => new Result(['@metadata' => ['statusCode' => 200]])
            ]);
        } else {
            return new Result($data + ['@metadata' => ['statusCode' => 200]]);
        }
    }
}
