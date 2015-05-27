<?php
namespace Aws\Test\Sqs;

use Aws\Middleware;
use Aws\Result;
use Aws\Sqs\SqsClient;
use Aws\Test\UsesServiceTrait;

/**
 * @covers Aws\Sqs\SqsClient
 */
class SqsClientTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testGetQueueArn()
    {
        $url = 'https://sqs.us-east-1.amazonaws.com/057737625318/php-integ-sqs-queue-1359765974';
        $arn = 'arn:aws:sqs:us-east-1:057737625318:php-integ-sqs-queue-1359765974';
        $sqs = new SqsClient([
            'region'  => 'us-east-1',
            'version' => 'latest'
        ]);
        $this->assertEquals($arn, $sqs->getQueueArn($url));
    }

    /**
     * @expectedException \Aws\Sqs\Exception\SqsException
     * @expectedExceptionMessage MD5 mismatch. Expected foo, found ddc35f88fa71b6ef142ae61f35364653
     */
    public function testValidatesMd5OfBody()
    {
        $client = new SqsClient([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);

        $mock = new Result(['Messages' => [['MD5OfBody' => 'foo', 'Body' => 'Bar']]]);
        $this->addMockResults($client, [$mock]);
        $client->receiveMessage(['QueueUrl' => 'http://foo.com']);
    }

    public function testSkipsCommandsThatAreNotReceiveMessage()
    {
        $client = new SqsClient([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
        $this->addMockResults($client, [new Result()]);
        $client->listQueues();
    }

    public function testUpdatesQueueUrl()
    {
        // Setup state of command/request
        $newUrl = 'https://queue.amazonaws.com/stuff/in/the/path';
        $client = new SqsClient([
            'region'  => 'us-east-1',
            'version' => 'latest'
        ]);
        $this->addMockResults($client, [[]]);
        $client->getHandlerList()->appendSign(Middleware::tap(function ($c, $r) use ($newUrl) {
            $this->assertEquals($newUrl, $r->getUri());
        }));
        $client->receiveMessage(['QueueUrl' => $newUrl]);
    }
}
