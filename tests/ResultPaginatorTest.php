<?php
namespace Aws\Test;

use Aws\Result;

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
        $this->addMockResults(
            $client,
            $results,
            function () use (&$requestCount) {
                $requestCount++;
            }
        );
        $paginator = $client->getPaginator('ListTables', [], $config);

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

    /**
     * @dataProvider getPaginatorIterationData
     */
    public function testAsyncWorkflow(
        array $config,
        array $results,
        $expectedRequestCount,
        array $expectedTableNames
    ) {
        // Create the client and paginator
        $client = $this->getTestClient('dynamodb');
        $this->addMockResults($client, $results);
        $paginator = $client->getPaginator('ListTables', [], $config);

        $tables = [];
        $lastResult = $paginator->each(function (Result $result) use (&$tables) {
            $tables = array_merge($tables, $result['TableNames']);
        })->wait();

        // Make sure the paginator yields the expected results
        $this->assertInstanceOf('Aws\\Result', $lastResult);
        $this->assertEquals($expectedTableNames, $tables);
    }

    public function testNonIterator()
    {
        // Get test data
        $config = $this->getPaginatorIterationData()[0][0];
        $results = $this->getPaginatorIterationData()[0][1];

        // Create the client and paginator
        $client = $this->getTestClient('dynamodb');
        $this->addMockResults($client, $results);
        $paginator = $client->getPaginator('ListTables', [], $config);
        $this->assertEquals(['test1', 'test2'], $paginator->current()['TableNames']);
        $this->assertEquals('test2', $this->readAttribute($paginator, 'nextToken'), '[1]');
        $paginator->next();
        $this->assertEquals([], $paginator->current()['TableNames']);
        $this->assertEquals('test2', $this->readAttribute($paginator, 'nextToken'), '[2]');
        $paginator->next();
        $this->assertEquals(['test3'], $paginator->current()['TableNames']);
        $this->assertNull($this->readAttribute($paginator, 'nextToken'), '[3]');
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
            ],
            [
                // Config
                ['output_token' => null],
                // Results
                [new Result(['TableNames' => ['test1']]),],
                // Request count
                1,
                // Table names
                ['test1'],
            ],
            [
                // Config
                ['more_results' => 'IsTruncated'],
                // Results
                [new Result(['TableNames' => ['test1'], 'IsTruncated' => false]),],
                // Request count
                1,
                // Table names
                ['test1'],
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
            new Result(['TableNames' => ['d4']]),
        ], function () use (&$requestCount) {
            $requestCount++;
        });

        $paginator = $client->getPaginator('ListTables', [], [
            'input_token'  => 'NextToken',
            'output_token' => 'LastToken'
        ]);

        $tableNames = [];
        foreach ($paginator->search('TableNames[][::-1]', 3) as $table) {
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
