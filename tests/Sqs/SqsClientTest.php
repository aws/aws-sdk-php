<?php
namespace Aws\Test\Sqs;

use Aws\Sqs\SqsClient;

/**
 * @covers Aws\Sqs\SqsClient
 */
class SqsClientTest extends \PHPUnit_Framework_TestCase
{
    public function testGetQueueArn()
    {
        $url = 'https://sqs.us-east-1.amazonaws.com/057737625318/php-integ-sqs-queue-1359765974';
        $arn = 'arn:aws:sqs:us-east-1:057737625318:php-integ-sqs-queue-1359765974';
        $sqs = SqsClient::factory(['region' => 'us-east-1']);
        $this->assertEquals($arn, $sqs->getQueueArn($url));
    }
}
