<?php
namespace Aws\Test\Sqs;

use Aws\Middleware;
use Aws\Result;
use Aws\Sqs\SqsClient;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Sqs\SqsClient
 */
class SqsClientTest extends TestCase
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

    public function testFifoQueueArn()
    {
        $url = 'https://sqs.us-east-1.amazonaws.com/057737625318/php-integ-sqs-queue-1359765974.fifo';
        $arn = 'arn:aws:sqs:us-east-1:057737625318:php-integ-sqs-queue-1359765974.fifo';
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

    /**
     * @expectedException \Aws\Sqs\Exception\SqsException
     * @expectedExceptionMessage Attribute MD5 mismatch. Expected foo, found ee5a4b60facbcc4723c1b5b8baca2593
     */
    public function testValidatesMd5OfMessageAttributes()
    {
        $client = new SqsClient([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);

        $mock = new Result(['Messages' => [[
            'Body' => 'Test',
            'MD5OfMessageAttributes' => 'foo',
            'MessageAttributes' => [
                'Reference' => [
                    'BinaryValue' => 'ID-1234',
                    'DataType' => 'Binary'
                ],
                'Name' => [
                    'StringValue' => 'Bob',
                    'DataType' => 'String'
                ],
                'LastName' => [
                    'StringValue' => 'Smith',
                    'DataType' => 'String.LN'
                ],
                'Id' => [
                    'StringValue' => '3.14',
                    'DataType' => 'Number'
                ],
                'Test' => [
                    'StringValue' => '短发',
                    'DataType' => 'String'
                ],
                'Test2' => [
                    'StringValue' => 'true',
                    'DataType' => 'String.短发'
                ],
                'name' => [
                    'StringValue' => 'bob',
                    'DataType' => 'String'
                ],
                'Named' => [
                    'StringValue' => 'true',
                    'DataType' => 'String'
                ],
            ]
        ]]]);
        $this->addMockResults($client, [$mock]);
        $client->receiveMessage([
            'QueueUrl' => 'http://foo.com',
            'MessageAttributeNames' => [
                'All'
            ],
        ]);
    }

    /**
     * @expectedException \Aws\Sqs\Exception\SqsException
     * @expectedExceptionMessage No Attribute MD5 found. Expected 0408bb33aa149494a6a4683d58a7133f
     */
    public function testValidatesMd5OfMessageAttributesExists()
    {
        $client = new SqsClient([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);

        $mock = new Result(['Messages' => [[
            'Body' => 'Test',
            'MessageAttributes' => [
                'Name' => [
                    'StringValue' => 'Bob',
                    'DataType' => 'String'
                ]
            ]
        ]]]);
        $this->addMockResults($client, [$mock]);
        $client->receiveMessage([
            'QueueUrl' => 'http://foo.com',
            'MessageAttributeNames' => [
                'All'
            ],
        ]);
    }

    /**
     * @expectedException \Aws\Sqs\Exception\SqsException
     * @expectedExceptionMessage Attribute MD5 mismatch. Expected foo, found No Attributes
     */
    public function testValidatesMessageAttributesExistWithMd5()
    {
        $client = new SqsClient([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);

        $mock = new Result(['Messages' => [[
            'Body' => 'Test',
            'MD5OfMessageAttributes' => 'foo',
        ]]]);
        $this->addMockResults($client, [$mock]);
        $client->receiveMessage([
            'QueueUrl' => 'http://foo.com',
            'MessageAttributeNames' => [
                'All'
            ],
        ]);
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
