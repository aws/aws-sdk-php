<?php
namespace Aws\Test\DynamoDb;

use Aws\DynamoDb\DynamoDbClient;
use Aws\Test\SdkTest;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Subscriber\Retry\RetrySubscriber;

/**
 * @covers \Aws\DynamoDb\DynamoDbClient
 */
class DynamoDbClientTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testDisablesRedirects()
    {
        $client = new DynamoDbClient([
            'service' => 'dynamodb',
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
        $this->assertFalse($client->getHttpClient()->getDefaultOption('allow_redirects'));
    }

    public function testUsesCustomBackoffStrategy()
    {
        $client = new DynamoDbClient([
            'service' => 'dynamodb',
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
        $c = $client->getHttpClient();
        $found = false;

        foreach ($c->getEmitter()->listeners('error') as $listener) {
            if (is_array($listener) &&
                $listener[0] instanceof RetrySubscriber
            ) {
                $found = $listener[0];
            }
        }

        if (!$found) {
            $this->fail('RetrySubscriber not registered');
        }

        $delay = $this->readAttribute($found, 'delayFn');
        $this->assertInternalType('callable', $delay);
        $this->assertEquals(0, call_user_func($delay, 0));
        $this->assertEquals(0.05, call_user_func($delay, 1));
        $this->assertEquals(0.10, call_user_func($delay, 2));
    }

    public function testCanDisableRetries()
    {
        $client = new DynamoDbClient([
            'service' => 'dynamodb',
            'region'  => 'us-west-2',
            'retries' => 0,
            'version' => 'latest'
        ]);
        $c = $client->getHttpClient();
        $this->assertFalse(SdkTest::hasListener(
            $c->getEmitter(),
            'GuzzleHttp\Subscriber\Retry\RetrySubscriber',
            'error'
        ));
    }

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
}
