<?php
namespace Aws\Test\Sqs;

use Aws\Sqs\SqsClient;
use Aws\Test\SdkTest;

/**
 * @covers Aws\Sqs\SqsClient
 */
class SqsClientTest extends \PHPUnit_Framework_TestCase
{
    public function testAttachesSubscribers()
    {
        $client = new SqsClient([
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

    public function testGetQueueArn()
    {
        $url = 'https://sqs.us-east-1.amazonaws.com/057737625318/php-integ-sqs-queue-1359765974';
        $arn = 'arn:aws:sqs:us-east-1:057737625318:php-integ-sqs-queue-1359765974';
        $sqs = SqsClient::factory([
            'region'  => 'us-east-1',
            'version' => 'latest'
        ]);
        $this->assertEquals($arn, $sqs->getQueueArn($url));
    }
}
