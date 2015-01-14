<?php
namespace Aws\Test\Common;

use Aws\Result;
use Aws\Test\UsesServiceTrait;

/**
 * @covers Aws\ResultPaginator
 */
class ResultPaginatorTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    /**
     * @dataProvider getPaginatorIterationData
     */
    public function testStandardIterationWorkflow(
        array $config,
        array $results,
        $expectedRequestCount,
        array $expectedTableNames
    ) {
        $requestCount = 0;

        // Create the client and paginator
        $client = $this->getTestClient('dynamodb');
        $this->addMockResults($client, $results);
        $paginator = $client->getPaginator('ListTables', [], $config + [
            'process' => function () use (&$requestCount) {$requestCount++;}
        ]);

        // Iterate over the paginator and keep track of the keys and values
        $tableNames = [];
        $lastKey = $result = null;
        foreach ($paginator as $key => $result) {
            $tableNames = array_merge($tableNames, $result['TableNames']);
            $lastKey = $key;
        }

        // Make sure the paginator yields the expected results
        $this->assertInstanceOf('Aws\\Result', $result);
        $this->assertEquals($expectedRequestCount, $requestCount);
        $this->assertEquals($expectedRequestCount - 1, $lastKey);
        $this->assertEquals($expectedTableNames, $tableNames);
    }

    public function testNonIteratorMethods()
    {
        // Get test data
        $config = $this->getPaginatorIterationData()[0][0];
        $results = $this->getPaginatorIterationData()[0][1];

        // Create the client and paginator
        $client = $this->getTestClient('dynamodb');
        $this->addMockResults($client, $results);
        $paginator = $client->getPaginator('ListTables', [], $config);
        $paginator->next();
        $this->assertEquals(['test1', 'test2'], $paginator->current()['TableNames']);
        $this->assertEquals('test2', $paginator->getNextToken());
        $paginator->next();
        $this->assertEquals([], $paginator->current()['TableNames']);
        $this->assertEquals('test2', $paginator->getNextToken());
        $paginator->next();
        $this->assertEquals(['test3'], $paginator->current()['TableNames']);
        $this->assertNull($paginator->getNextToken());
    }

    /**
     * @return array Test data
     */
    public function getPaginatorIterationData()
    {
        return [
            // Single field token case
            [
                // Config
                ['input_token' => 'NextToken', 'output_token' => 'LastToken'],
                // Results
                [
                    new Result(['LastToken' => 'test2', 'TableNames' => ['test1', 'test2']]),
                    new Result(['LastToken' => 'test2', 'TableNames' => []]),
                    new Result(['TableNames' => ['test3']]),
                ],
                // Request count
                3,
                // Table names
                ['test1', 'test2', 'test3'],
            ],
            [
                // Config
                ['input_token' => ['NT1', 'NT2'], 'output_token' => ['LT1', 'LT2']],
                // Results
                [
                    new Result(['LT1' => 'foo', 'LT2' => 'bar', 'TableNames' => ['test1', 'test2']]),
                    new Result(['LT1' => 'foo', 'LT2' => 'bar', 'TableNames' => []]),
                    new Result(['TableNames' => ['test3']]),
                ],
                // Request count
                3,
                // Table names
                ['test1', 'test2', 'test3'],
            ]
        ];
    }

    public function testCanSearchOverResultsUsingFlatMap()
    {
        $requestCount = 0;
        $client = $this->getTestClient('dynamodb');
        $this->addMockResults($client, [
            new Result(['LastToken' => 'b2', 'TableNames' => ['a1', 'b2']]),
            new Result(['LastToken' => 'b2', 'TableNames' => []]),
            new Result(['TableNames' => ['c3']]),
        ]);

        $paginator = $client->getPaginator('ListTables', [], [
            'input_token'  => 'NextToken',
            'output_token' => 'LastToken',
            'process'      => function () use (&$requestCount) {
                $requestCount++;
            }
        ]);

        $tableNames = [];
        foreach ($paginator->search('TableNames[][::-1]') as $table) {
            $tableNames[] = $table;
        }

        $this->assertEquals(3, $requestCount);
        $this->assertEquals(['1a', '2b', '3c'], $tableNames);
    }

    public function testGracefullyHandlesSingleValueResults()
    {
        $client = $this->getTestClient('dynamodb');
        $this->addMockResults($client, [
            new Result(['LastToken' => 'b2', 'TableNames' => ['a1', 'b2']]),
            new Result(['LastToken' => 'b2', 'TableNames' => []]),
            new Result(['TableNames' => ['c3']]),
        ]);

        $paginator = $client->getPaginator('ListTables', [], [
            'input_token'  => 'NextToken',
            'output_token' => 'LastToken'
        ]);

        $tableNames = [];
        foreach ($paginator->search('TableNames[0]') as $table) {
            $tableNames[] = $table;
        }

        $this->assertEquals(['a1', 'c3'], $tableNames);
    }
}
