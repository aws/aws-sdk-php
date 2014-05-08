<?php
namespace Aws\Test\Service\Sqs;

use Aws\Service\Sqs\SqsFactory;
use Aws\Test\SdkTest;

/**
 * @covers Aws\Service\Sqs\SqsFactory
 */
class SqsFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testAttachesSubscribers()
    {
        $f = new SqsFactory();
        $client = $f->create([
            'service' => 'sqs',
            'region'  => 'us-west-2'
        ]);

        $this->assertTrue(SdkTest::hasListener(
            $client->getEmitter(),
            'Aws\Service\Sqs\QueueUrlListener',
            'prepare'
        ));

        $this->assertTrue(SdkTest::hasListener(
            $client->getEmitter(),
            'Aws\Service\Sqs\Md5ValidatorListener',
            'process'
        ));
    }
}
