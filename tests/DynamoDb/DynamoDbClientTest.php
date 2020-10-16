<?php
namespace Aws\Test\DynamoDb;

use Aws\Command;
use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDb\Exception\DynamoDbException;
use Aws\Exception\AwsException;
use Aws\MockHandler;
use Aws\Result;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Promise\RejectedPromise;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Stream;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\DynamoDb\DynamoDbClient
 */
class DynamoDbClientTest extends TestCase
{
    use UsesServiceTrait;

    /**
     * @runInSeparateProcess
     */
    public function testRegisterSessionHandlerReturnsHandler()
    {
        $client = $this->getTestSdk()->createDynamoDb();
        $sh = $client->registerSessionHandler(['locking' => true]);
        $this->assertInstanceOf(
            'Aws\DynamoDb\LockingSessionConnection',
            $this->readAttribute($sh, 'connection')
        );
    }

    public function dataForFormatValueTest()
    {
        $handle = fopen('php://memory', 'w+');
        fwrite($handle, 'foo');
        rewind($handle);
        $stream = Stream::factory('bar');

        return [
            // String values
            [ 'foo',   '{"S":"foo"}' ],
            [ ['foo'], '{"SS":["foo"]}' ],
            [ ['foo',  'bar', 'baz'], '{"SS":["foo","bar","baz"]}' ],

            // Numerical values
            [ 1,               '{"N":"1"}' ],
            [ 0,               '{"N":"0"}' ],
            [ 50,              '{"N":"50"}' ],
            [ 1.23,            '{"N":"1.23"}' ],
            [ 1e10,            '{"N":"10000000000"}' ],
            [ [1],             '{"NS":["1"]}' ],
            [ [0],             '{"NS":["0"]}' ],
            [ [1, 2, 3],       '{"NS":["1","2","3"]}' ],
            [ [1.2, 3.4, 5.6], '{"NS":["1.2","3.4","5.6"]}' ],

            // Numerical strings values
            [ '1',                   '{"S":"1"}' ],
            [ '0',                   '{"S":"0"}' ],
            [ '50',                  '{"S":"50"}' ],
            [ '1.23',                '{"S":"1.23"}' ],
            [ '1e10',                '{"S":"1e10"}' ],
            [ ['1'],                 '{"SS":["1"]}' ],
            [ ['0'],                 '{"SS":["0"]}' ],
            [ ['1', '2', '3'],       '{"SS":["1","2","3"]}' ],
            [ ['1.2', '3.4', '5.6'], '{"SS":["1.2","3.4","5.6"]}' ],

            // Boolean values
            [ true,    '{"N":"1"}' ],
            [ false,   '{"N":"0"}' ],
            [ [true],  '{"NS":["1"]}' ],
            [ [false], '{"NS":["0"]}' ],

            // Empty and non-scalar values
            [ '',            null ],
            [ null,          null ],
            [ [],            null ],
            [ [null],        null ],
            [ ['foo', 1],    null ],
            [ new \stdClass, null ],
            [ $handle,       '{"B":"foo"}' ],
            [ $stream,       '{"B":"bar"}' ],
        ];
    }

    /**
     * @dataProvider dataProviderRetrySettings
     */
    public function testRetriesOnDynamoSpecificRetryableException($settings)
    {
        $params = [
            'TableName' => 'foo',
            'Key' => ['baz' => ['S' => 'foo']]
        ];
        $dynamoRetryableException = new AwsException(
            'TransactionInProgressException',
            new Command('GetItem', $params),
            [
                'code' => 'TransactionInProgressException'
            ]
        );
        $queue = [
            $dynamoRetryableException,
            $dynamoRetryableException,
            new AwsException(
                'NonRetryableException',
                new Command('GetItem', $params),
                [
                    'code' => 'NonRetryableException'
                ]
            ),
            new Result(),
        ];
        $attemptCount = 0;
        $callback = function() use (&$attemptCount) {
            $attemptCount++;
        };
        $handler = new MockHandler($queue, $callback, $callback);

        $client = new DynamoDbClient([
            'region'       => 'us-east-1',
            'version'      => 'latest',
            'retries'      => $settings,
        ]);

        $list = $client->getHandlerList();
        $list->setHandler($handler);

        try {
            $client->getItem($params);
            $this->fail('This operation should have failed with a NonRetryableException.');
        } catch(AwsException $e) {
            $this->assertSame('NonRetryableException', $e->getAwsErrorCode());
        }

        $this->assertSame(3, $attemptCount);
    }

    public function dataProviderRetrySettings()
    {
        return [
            [
                [
                    'mode' => 'legacy'
                ]
            ],
            [
                [
                    'mode' => 'standard'
                ]
            ],
            [
                [
                    'mode' => 'adaptive'
                ]
            ],
        ];
    }

    public function testValidatesAndRetriesCrc32()
    {
        $queue = [
            new Response(200, ['x-amz-crc32' => '123'], '"foo"'),
            new Response(200, ['x-amz-crc32' => '400595255'], '"foo"')
        ];

        $handler = function ($request, $options) use (&$queue) {
            // Test the custom retry policy.
            if (count($queue) == 1) {
                $this->assertSame(0, $options['delay']);
            }

            return \GuzzleHttp\Promise\promise_for(array_shift($queue));
        };

        $client = new DynamoDbClient([
            'region'       => 'us-east-1',
            'version'      => 'latest',
            'http_handler' => $handler,
        ]);

        $client->getItem([
            'TableName' => 'foo',
            'Key' => ['baz' => ['S' => 'foo']]
        ]);

        $this->assertEmpty($queue);
    }

    /**
     * @dataProvider dataProviderRetrySettings
     *
     * @param $settings
     */
    public function testAppliesRetryStatsConfig($settings)
    {
        $client = new DynamoDbClient([
            'stats' => ['retries' => true],
            'version' => 'latest',
            'region' => 'us-west-2',
            'handler' => function () {
                return new RejectedPromise(
                    new DynamoDbException('a', new Command('b'), [
                        'connection_error' => true,
                    ])
                );
            },
            'retries' => $settings
        ]);

        try {
            $client->listTables();
            $this->fail('The operation should have failed');
        } catch (DynamoDbException $e) {
            $this->assertNotNull($e->getTransferInfo('retries_attempted'));
            $this->assertGreaterThan(0, $e->getTransferInfo('retries_attempted'));
        }
    }
}
