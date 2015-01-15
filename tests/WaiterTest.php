<?php
namespace Aws\Test;

use Aws\Result;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Ring\Client\MockHandler;

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
        $client = $this->getTestClient('dynamodb');
        $client->waitUntil(
            'TableExists',
            ['TableName' => 'Meh'],
            ['delay' => null]
        );
    }

    public function testCanCancel()
    {
        $client = $this->getTestClient('dynamodb');
        $client->waitUntil('TableExists', [
            'TableName' => 'Meh',
            '@future'   => true,
        ])->cancel();
    }

    public function testCanWait()
    {
        $i = 0;
        $client = $this->getTestClient('dynamodb', [
            'ringphp_handler' => new MockHandler(function () use (&$i) {
                if ($i++) {
                    return [
                        'status' => 200,
                        'body' => '{"Table":{"TableStatus":"ACTIVE"}}'
                    ];
                } else {
                    return [
                        'status' => 200,
                        'body' => '{"Table":{"TableStatus":"CREATING"}}'
                    ];
                }
            })
        ]);

        $client->waitUntil(
            'TableExists',
            ['TableName' => 'Meh'],
            ['initDelay' => 0.1, 'delay' => 0.1]
        );
    }

    /**
     * @dataProvider getWaiterWorkflowTestCases
     */
    public function testWaiterWorkflow($results, $expectedException)
    {
        // Prepare a client
        $client = $this->getTestClient('dynamodb', [
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
                'Waiter failed after the attempt #5.'
            ],
            [
                [
                    $this->createMockAwsException(null, null, 'foo'),
                ],
                'The TableExists waiter entered a failure state.'
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
    public function testMatchers($matcher, $event, $acceptor, $expected)
    {
        $waiter = new \ReflectionClass('Aws\Waiter');
        $matcher = $waiter->getMethod($matcher);
        $matcher->setAccessible(true);
        $waiter = $waiter->newInstanceWithoutConstructor();

        $this->assertEquals(
            $expected,
            $matcher->invoke($waiter, $event, $acceptor)
        );
    }

    public function getMatchersTestCases()
    {
        return [
            [
                'matchesPath',
                $this->getMockProcessEvent(200, null),
                [],
                false
            ],
            [
                'matchesPath',
                $this->getMockProcessEvent(200, ['a' => ['b' => 'c']]),
                ['argument' => 'a.b', 'expected' => 'c'],
                true
            ],
            [
                'matchesPath',
                $this->getMockProcessEvent(200, ['a' => ['b' => 'c']]),
                ['argument' => 'a', 'expected' => 'z'],
                false
            ],
            [
                'matchesPathAll',
                $this->getMockProcessEvent(200, null),
                [],
                false
            ],
            [
                'matchesPathAll',
                $this->getMockProcessEvent(200, ['a' => [
                    ['b' => 'c'],
                    ['b' => 'c'],
                    ['b' => 'c']
                ]]),
                ['argument' => 'a[].b', 'expected' => 'c'],
                true
            ],
            [
                'matchesPathAll',
                $this->getMockProcessEvent(200, ['a' => [
                    ['b' => 'c'],
                    ['b' => 'z'],
                    ['b' => 'c']
                ]]),
                ['argument' => 'a[].b', 'expected' => 'c'],
                false
            ],
            [
                'matchesPathAny',
                $this->getMockProcessEvent(200, null),
                [],
                false
            ],
            [
                'matchesPathAny',
                $this->getMockProcessEvent(200, ['a' => [
                    ['b' => 'c'],
                    ['b' => 'd'],
                    ['b' => 'e']
                ]]),
                ['argument' => 'a[].b', 'expected' => 'c'],
                true
            ],
            [
                'matchesPathAny',
                $this->getMockProcessEvent(200, ['a' => [
                    ['b' => 'x'],
                    ['b' => 'y'],
                    ['b' => 'z']
                ]]),
                ['argument' => 'a[].b', 'expected' => 'c'],
                false
            ],
            [
                'matchesStatus',
                $this->getMockProcessEvent(null),
                [],
                false
            ],
            [
                'matchesStatus',
                $this->getMockProcessEvent(200),
                ['expected' => 200],
                true
            ],
            [
                'matchesStatus',
                $this->getMockProcessEvent(200),
                ['expected' => 400],
                false
            ],
            [
                'matchesError',
                $this->getMockProcessEvent(),
                [],
                false
            ],
            [
                'matchesError',
                $this->getMockProcessEvent(400, [], 'InvalidData'),
                ['expected' => 'InvalidData'],
                true
            ],
            [
                'matchesError',
                $this->getMockProcessEvent(400, [], 'InvalidData'),
                ['expected' => 'Foo'],
                false
            ],
        ];
    }

    private function getMockProcessEvent($status = null, $result = null, $error = null)
    {
        $event = $this->getMockBuilder('GuzzleHttp\Command\Event\ProcessEvent')
            ->disableOriginalConstructor()
            ->setMethods(['getException', 'getResponse', 'getResult', 'setResult'])
            ->getMock();

        if ($status) {
            $event->method('getResponse')->willReturn(new Response($status));
        }

        if ($result) {
            $event->method('getResult')->willReturn(new Result($result));
        }

        if ($error) {
            $exception = $this->getMockBuilder('Aws\Exception\AwsException')
                ->disableOriginalConstructor()
                ->setMethods(['getAwsErrorCode'])
                ->getMock();
            $exception->method('getAwsErrorCode')->willReturn($error);
            $event->method('getException')->willReturn($exception);
            $event->method('setResult')->with(true);
        }

        return $event;
    }
}
