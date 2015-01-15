<?php
namespace Aws\Test\ClientFactory;

use Aws\ClientFactory\DynamoDb;
use Aws\Test\SdkTest;
use GuzzleHttp\Subscriber\Retry\RetrySubscriber;

/**
 * @covers Aws\ClientFactory\DynamoDb
 */
class DynamoDbFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testDisablesRedirects()
    {
        $f = new DynamoDb();
        $client = $f->create([
            'service' => 'dynamodb',
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
        $this->assertFalse($client->getHttpClient()->getDefaultOption('allow_redirects'));
    }

    public function testUsesCustomBackoffStrategy()
    {
        $f = new DynamoDb();
        $client = $f->create([
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
        $f = new DynamoDb();
        $client = $f->create([
            'service' => 'dynamodb',
            'region'  => 'us-west-2',
            'retries' => false,
            'version' => 'latest'
        ]);
        $c = $client->getHttpClient();
        $this->assertFalse(SdkTest::hasListener(
            $c->getEmitter(),
            'GuzzleHttp\Subscriber\Retry\RetrySubscriber',
            'error'
        ));
    }
}
