<?php
namespace Aws\Test\Sqs;

use Aws\Sqs\SqsFactory;
use Aws\Test\SdkTest;

/**
 * @covers Aws\Sqs\SqsFactory
 */
class SqsFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testAttachesSubscribers()
    {
        $f = new SqsFactory();
        $client = $f->create([
            'service' => 'sqs',
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);

        $this->assertTrue(SdkTest::hasListener(
            $client->getEmitter(),
            'Aws\Sqs\QueueUrlListener',
            'prepared'
        ));

        $this->assertTrue(SdkTest::hasListener(
            $client->getEmitter(),
            'Aws\Sqs\Md5ValidatorListener',
            'process'
        ));
    }
}
