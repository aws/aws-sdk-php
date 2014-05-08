<?php
namespace Aws\Test\Service\Sqs;

use Aws\Service\Sqs\SqsClient;

/**
 * @covers Aws\Service\Sqs\SqsClient
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
