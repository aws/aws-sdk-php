<?php
namespace Aws\Test\Waiter;

require_once 'wait_hack.php';

use Aws\Result;
use Aws\Test\UsesServiceTrait;

/**
 * @covers Aws\Waiter\ResourceWaiter
 */
class ResourceWaiterTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    /**
     * @dataProvider dataForWaiterCreationTest
     */
    public function testCreatesWorkingResourceWaiters($name, array $results, $expected)
    {
        \Aws\Waiter\usleep(0);

        // Mock the API provider
        $apiProvider = function ($type) {
            if ($type == 'api') {
                return [
                    'operations' => [
                        'DescribeTable' => ['input' => []],
                    ],
                    'metadata' => [
                        'protocol' => 'json',
                        'signatureVersion' => 'v4'
                    ],
                ];
            } else {
                return [
                    'waiters' => [
                        'TableExists' => [
                            'interval'      => 1,
                            'max_attempts'  => 5,
                            'operation'     => 'DescribeTable',
                            'ignore_errors' => ['ResourceNotFoundException'],
                            'success_type'  => 'output',
                            'success_path'  => 'Table.TableStatus',
                            'success_value' => 'ACTIVE',
                        ],
                        'TableNotExists' => [
                            'interval'      => 1,
                            'max_attempts'  => 5,
                            'operation'     => 'DescribeTable',
                            'success_type'  => 'error',
                            'success_value' => 'ResourceNotFoundException',
                        ],
                        'TableOutput' => [
                            'interval'      => 1,
                            'max_attempts'  => 5,
                            'operation'     => 'DescribeTable',
                            'success_type'  => 'output',
                        ],
                        'TableFail' => [
                            'interval'      => 1,
                            'max_attempts'  => 5,
                            'operation'     => 'DescribeTable',
                            'failure_type'  => 'output',
                            'failure_path'  => 'Table.TableStatus',
                            'failure_value' => 'DELETING',
                        ]
                    ]
                ];
            }
        };

        // Prepare a client
        $client = $this->getTestClient('dynamodb', ['api_provider' => $apiProvider]);
        $this->addMockResults($client, $results);

        // Handle exception test cases
        if (is_string($expected)) {
            $this->setExpectedException($expected);
        }

        // Execute the waiter and verify the time waited
        $client->waitUntil($name);
        $this->assertEquals($expected, \Aws\Waiter\usleep(0));
    }

    public function dataForWaiterCreationTest()
    {
        return [
            // Normal workflow with success_path
            ['TableExists', [
                $this->createMockAwsException('ResourceNotFoundException'),
                new Result(['Table' => ['TableStatus' => 'CREATING']]),
                new Result(['Table' => ['TableStatus' => 'CREATING']]),
                new Result(['Table' => ['TableStatus' => 'ACTIVE']]),
            ], 3000000],
            // Normal workflow with success_type: error
            ['TableNotExists', [
                new Result([]),
                $this->createMockAwsException('ResourceNotFoundException'),
            ], 1000000],
            // Non ignored exception is thrown
            ['TableExists', [
                $this->createMockAwsException('ValidationException'),
            ], 'Aws\Exception\AwsException'],
            // Waiter enters invalid state
            ['TableFail', [
                new Result([]),
                new Result(['Table' => ['TableStatus' => 'DELETING']]),
            ], 'RuntimeException'],
            // Success is determined solely on whether or not
            ['TableOutput', [
                new Result([]),
            ], 0],
            // When success_path yields no values
            ['TableExists', [
                new Result([]),
                new Result(['Table' => ['TableStatus' => 'ACTIVE']]),
            ], 1000000],
        ];
    }
}
