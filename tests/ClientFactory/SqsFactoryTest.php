<?php
namespace Aws\Test\Sqs;

use Aws\ClientFactory\Sqs;
use Aws\Test\SdkTest;

/**
 * @covers Aws\ClientFactory\Sqs
 */
class SqsTest extends \PHPUnit_Framework_TestCase
{
    public function testAttachesSubscribers()
    {
        $f = new Sqs();
        $client = $f->create([
            'service' => 'sqs',
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);

        $this->assertTrue(SdkTest::hasListener(
            $client->getEmitter(),
            'Aws\Sqs\QueueUrlSubscriber',
            'prepared'
        ));

        $this->assertTrue(SdkTest::hasListener(
            $client->getEmitter(),
            'Aws\Sqs\Md5ValidatorSubscriber',
            'process'
        ));
    }
}
