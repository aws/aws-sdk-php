<?php
namespace Aws\Test\Waiter;

require_once 'wait_hack.php';

use Aws\Result;
use Aws\Test\UsesServiceClientTrait;
use Aws\Waiter\ResourceWaiterFactory;

class ResourceWaiterFactoryTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceClientTrait;

    /**
     * @covers Aws\Waiter\ResourceWaiterFactory::__construct
     * @covers Aws\Waiter\ResourceWaiterFactory::prepareConfig
     * @dataProvider dataForWaiterConfigTest
     */
    public function testLoadAndResolvesWaiterConfigs($name, $expected)
    {
        // Mock the API provider
        $apiProvider = $this->getMock('Aws\Api\ApiProviderInterface');
        $apiProvider->expects($this->any())
            ->method('getServiceWaiterConfig')
            ->with($this->equalTo('foo'), $this->equalTo('latest'))
            ->will($this->returnValue([
                'waiters' => [
                    '__default__' => [
                        'acceptor_path' => 'Foo/Baz',
                        'acceptor_type' => 'output',
                        'max_attempts' => 10,
                    ],
                    'Test' => [
                        'success_value' => 'foo',
                        'ignore_errors' => ['1', '2'],
                    ],
                    'Extending' => [
                        'extends' => 'Test',
                        'failure_value' => 'fail',
                    ],
                    'Overwrite' => [
                        'extends' => 'Test',
                        'max_attempts' => 20,
                        'success_value' => 'abc',
                        'failure_type' => 'baz',
                    ]
                ]
            ]));

        // Create the factory
        $factory = new ResourceWaiterFactory($apiProvider, 'foo', 'latest');

        // Handle exception test cases
        if (is_string($expected)) {
            $this->setExpectedException($expected);
        }

        // Get the resolved config and verify its correctness
        $prepareConfig = new \ReflectionMethod($factory, 'prepareConfig');
        $prepareConfig->setAccessible(true);
        $actual = $prepareConfig->invoke($factory, $name);
        /** @var array $expected */
        foreach ($expected as $key => $value) {
            $this->assertEquals($value, $actual[$key]);
            $this->assertEquals($name, $actual['waiter_name']);
        }
    }

    public function dataForWaiterConfigTest()
    {
        return [
            ['Test', [
                'success_path'  => 'Foo/Baz',
                'success_type'  => 'output',
                'success_value' => 'foo',
                'failure_path'  => 'Foo/Baz',
                'failure_type'  => 'output',
                'max_attempts'  => 10,
                'ignore_errors' => ['1', '2'],
            ]],
            ['Extending', [
                'extends'       => 'Test',
                'success_path'  => 'Foo/Baz',
                'success_type'  => 'output',
                'success_value' => 'foo',
                'failure_path'  => 'Foo/Baz',
                'failure_type'  => 'output',
                'failure_value' => 'fail',
                'max_attempts'  => 10,
                'ignore_errors' => ['1', '2'],
            ]],
            ['Overwrite', [
                'extends'       => 'Test',
                'success_path'  => 'Foo/Baz',
                'success_type'  => 'output',
                'success_value' => 'abc',
                'failure_path'  => 'Foo/Baz',
                'failure_type'  => 'baz',
                'max_attempts'  => 20,
                'ignore_errors' => ['1', '2'],
            ]],
            ['Error', 'UnexpectedValueException']
        ];
    }

    /**
     * @covers Aws\Waiter\ResourceWaiterFactory::createWaiter
     * @covers Aws\Waiter\ResourceWaiterFactory::checkErrorAcceptor
     * @covers Aws\Waiter\ResourceWaiterFactory::checkResult
     * @covers Aws\Waiter\ResourceWaiterFactory::checkPath
     * @dataProvider dataForWaiterCreationTest
     */
    public function testCreatesWorkingResourceWaiters($name, array $results, $expected)
    {
        \Aws\Waiter\usleep(0);

        // Mock the API provider
        $apiProvider = $this->getMock('Aws\Api\ApiProviderInterface');
        $apiProvider->expects($this->any())
            ->method('getServiceWaiterConfig')
            ->will($this->returnValue(['waiters' => [
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
            ]]));

        // Prepare a client
        $client = $this->getTestClient('dynamodb');
        $this->addMockResults($client, $results);

        // Create the factory
        $factory = new ResourceWaiterFactory($apiProvider, 'dynamodb', 'latest');
        $waiter = $factory->createWaiter($client, $name);

        // Handle exception test cases
        if (is_string($expected)) {
            $this->setExpectedException($expected);
        }

        // Execute the waiter and verify the time waited
        $waiter->wait();
        $this->assertEquals($expected, \Aws\Waiter\usleep(0));
    }

    public function dataForWaiterCreationTest()
    {
        return [
            // Normal workflow with success_path
            ['TableExists', [
                $this->createMockCommandException('ResourceNotFoundException'),
                new Result(['Table' => ['TableStatus' => 'CREATING']]),
                new Result(['Table' => ['TableStatus' => 'CREATING']]),
                new Result(['Table' => ['TableStatus' => 'ACTIVE']]),
            ], 3000000],
            // Normal workflow with success_type: error
            ['TableNotExists', [
                new Result([]),
                $this->createMockCommandException('ResourceNotFoundException'),
            ], 1000000],
            // Non ignored exception is thrown
            ['TableExists', [
                $this->createMockCommandException('ValidationException'),
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
