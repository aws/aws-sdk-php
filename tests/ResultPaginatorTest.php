<?php
namespace Aws\Test;

use Aws\Api\ApiProvider;
use Aws\CommandInterface;
use Aws\DynamoDb\DynamoDbClient;
use Aws\Result;
use Psr\Http\Message\RequestInterface;

/**
 * @covers Aws\ResultPaginator
 */
class ResultPaginatorTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    private function getCustomClientProvider(array $config)
    {
        // Create the client and paginator
        $provider = ApiProvider::defaultProvider();
        return new DynamoDbClient([
            'region'  => 'us-west-2',
            'version' => 'latest',
            'api_provider' => function ($t, $s, $v) use ($provider, $config) {
                if ($t === 'paginator') {
                    $res = $provider($t, $s, $v);
                    $res['pagination']['ListTables'] = $config
                        + $res['pagination']['ListTables'];
                    return $res;
                } else {
                    return $provider($t, $s, $v);
                }
            }
        ]);
    }

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
        $client = $this->getCustomClientProvider($config);
        $this->addMockResults(
            $client,
            $results,
            function () use (&$requestCount) {
                $requestCount++;
            }
        );

        $paginator = $client->getPaginator('ListTables');

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
        $client = $this->getCustomClientProvider($config);
        $this->addMockResults($client, $results);
        $paginator = $client->getPaginator('ListTables', []);

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
        $client = $this->getCustomClientProvider($config);
        $this->addMockResults($client, $results);
        $paginator = $client->getPaginator('ListTables', [], $config);
        $this->assertEquals(['test1', 'test2'], $paginator->current()['TableNames']);
        $this->assertEquals(['NextToken' => 'test2'], $this->readAttribute($paginator, 'nextToken'), '[1]');
        $paginator->next();
        $this->assertEquals([], $paginator->current()['TableNames']);
        $this->assertEquals(['NextToken' => 'test2'], $this->readAttribute($paginator, 'nextToken'), '[2]');
        $paginator->next();
        $this->assertEquals(['test3'], $paginator->current()['TableNames']);
        $this->assertEmpty($this->readAttribute($paginator, 'nextToken'), '[3]');
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
            ],
            [
                // Config
                ['input_token' => ['NT1', 'NT2', 'NT3'], 'output_token' => ['LT1', 'LT2', 'NT3']],
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
        ];
    }

    public function testCanSearchOverResultsUsingFlatMap()
    {
        $requestCount = 0;
        $client = $this->getCustomClientProvider([
            'input_token'  => 'NextToken',
            'output_token' => 'LastToken'
        ]);

        $this->addMockResults($client, [
            new Result(['LastToken' => 'b2', 'TableNames' => ['a1', 'b2']]),
            new Result(['LastToken' => 'b2', 'TableNames' => []]),
            new Result(['LastToken' => 'b2', 'TableNames' => ['c3']]),
            new Result(['TableNames' => ['d4']]),
        ], function () use (&$requestCount) {
            $requestCount++;
        });

        $paginator = $client->getPaginator('ListTables');

        $tableNames = [];
        foreach ($paginator->search('TableNames[] | [::-1]') as $table) {
            $tableNames[] = $table;
        }

        $this->assertEquals(4, $requestCount);
        $this->assertEquals(['b2', 'a1', 'c3', 'd4'], $tableNames);
    }

    public function testGracefullyHandlesSingleValueResults()
    {
        $client = $this->getCustomClientProvider([
            'input_token'  => 'NextToken',
            'output_token' => 'LastToken'
        ]);
        $this->addMockResults($client, [
            new Result(['LastToken' => 'b2', 'TableNames' => ['a1', 'b2']]),
            new Result(['LastToken' => 'b2', 'TableNames' => []]),
            new Result(['TableNames' => ['c3']]),
        ]);

        $paginator = $client->getPaginator('ListTables');

        $tableNames = [];
        foreach ($paginator->search('TableNames[0]') as $table) {
            $tableNames[] = $table;
        }

        $this->assertEquals(['a1', 'c3'], $tableNames);
    }

    public function testYieldsReturnedCallbackPromises()
    {
        $client = $this->getTestClient('s3');
        $results = [
            [
                'IsTruncated' => true,
                'Contents' => [
                    ['Key' => 0],
                    ['Key' => 1],
                ]
            ],
            [],
            [
                'IsTruncated' => false,
                'Contents' => [
                    ['Key' => 2],
                    ['Key' => 3],
                ]
            ],
            []
        ];

        $handler = function (CommandInterface $cmd, RequestInterface $request) use (&$results, &$cmds) {
            $cmds[] = $cmd;
            return \GuzzleHttp\Promise\promise_for(
                new Result(array_shift($results))
            );
        };

        $client->getHandlerList()->setHandler($handler);
        $p = $client->getPaginator('ListObjects', ['Bucket' => 'foo']);
        $promise = $p->each(function ($page) use ($client) {
            return $client->headObjectAsync([
                'Bucket' => 'foo',
                'Key'    => implode('.', \JmesPath\search('Contents[].Key', $page))
            ]);
        });

        $promise->wait();
        $this->assertCount(4, $cmds);
        $this->assertEquals('ListObjects', $cmds[0]->getName());
        $this->assertEquals('HeadObject', $cmds[1]->getName());
        $this->assertEquals('ListObjects', $cmds[2]->getName());
        $this->assertEquals('HeadObject', $cmds[3]->getName());
        $this->assertEquals('0.1', $cmds[1]['Key']);
        $this->assertEquals('2.3', $cmds[3]['Key']);
    }

    public function testDoesNotInsertMissingOutputTokensIntoNextRequest()
    {
        $client = $this->getTestClient('route53');
        $pagingChatter = [
            [
                'request' => [],
                'response' => [
                    'IsTruncated' => true,
                    "NextRecordName" => 'foo',
                    "NextRecordType" => 'bar',
                    'ResourceRecordSets' => [['ResourceId' => 'a']],
                ],
            ],
            [
                'request' => [
                    'StartRecordName' => 'foo',
                    'StartRecordType' => 'bar',
                ],
                'response' => [
                    'IsTruncated' => true,
                    "NextRecordName" => 'foo',
                    "NextRecordType" => 'bar',
                    "NextRecordIdentifier" => 'baz',
                    'ResourceRecordSets' => [['ResourceId' => 'b']],
                ],
            ],
            [
                'request' => [
                    'StartRecordName' => 'foo',
                    'StartRecordType' => 'bar',
                    'StartRecordIdentifier' => 'baz',
                ],
                'response' => [
                    'IsTruncated' => true,
                    "NextRecordName" => 'foo',
                    "NextRecordType" => 'bar',
                    'ResourceRecordSets' => [['ResourceId' => 'c']],
                ],
            ],
            [
                'request' => [
                    'StartRecordName' => 'foo',
                    'StartRecordType' => 'bar',
                ],
                'response' => [
                    'IsTruncated' => false,
                    'ResourceRecordSets' => [['ResourceId' => 'd']],
                ],
            ]
        ];

        $handler = function (CommandInterface $cmd, RequestInterface $request) use (&$pagingChatter) {
            $currentWindow = array_shift($pagingChatter);
            foreach ($currentWindow['request'] as $expectedKey => $expectedValue) {
                $this->assertArrayHasKey($expectedKey, $cmd);
                $this->assertSame($expectedValue, $cmd[$expectedKey]);
            }
            return \GuzzleHttp\Promise\promise_for(
                new Result($currentWindow['response'])
            );
        };

        $client->getHandlerList()->setHandler($handler);
        $paginator = $client->getPaginator('ListResourceRecordSets', ['HostedZoneId' => 'id']);

        $setIds = [];
        foreach ($paginator->search('a') as $b) {

        }
    }
}
