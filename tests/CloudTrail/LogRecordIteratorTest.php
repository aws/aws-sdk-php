<?php
namespace Aws\Test\CloudTrail;

use Aws\S3\S3Client;
use Aws\CloudTrail\CloudTrailClient;
use Aws\CloudTrail\LogFileReader;
use Aws\CloudTrail\LogRecordIterator;
use GuzzleHttp\Subscriber\Mock;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;

/**
 * @covers Aws\CloudTrail\LogRecordIterator
 */
class LogRecordIteratorTest extends \PHPUnit_Framework_TestCase
{
    public function testFactoryCanCreateForTrail()
    {
        $s3 = S3Client::factory([
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'version'     => 'latest'
        ]);
        $cloudTrailClient = CloudTrailClient::factory([
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'region'      => 'us-west-2',
            'version'     => 'latest'
        ]);
        $json = '{"trailList":[{"IncludeGlobalServiceEvents":true,"Name":"Default","S3BucketName":"log-bucket"}]}';
        $mock = new Mock([new Response(200, [], Stream::factory($json))]);
        $cloudTrailClient->getHttpClient()->getEmitter()->attach($mock);
        $records = LogRecordIterator::forTrail($s3, $cloudTrailClient);
        $this->assertInstanceOf('Aws\CloudTrail\LogRecordIterator', $records);
    }

    public function testFactoryCanCreateForBucket()
    {
        $s3 = S3Client::factory([
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'version'     => 'latest'
        ]);
        $records = LogRecordIterator::forBucket($s3, 'test-bucket');
        $this->assertInstanceOf('Aws\CloudTrail\LogRecordIterator', $records);
    }

    public function testFactoryCanCreateForFile()
    {
        $s3 = S3Client::factory([
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'version'     => 'latest'
        ]);
        $records = LogRecordIterator::forFile($s3, 'test-bucket', 'test-key');
        $this->assertInstanceOf('Aws\CloudTrail\LogRecordIterator', $records);
    }

    public function testIteratorBehavesCorrectlyBeforeRewind()
    {
        $logFileReader = $this->getMockBuilder('Aws\CloudTrail\LogFileReader')
            ->disableOriginalConstructor()
            ->getMock();
        $logFileIterator = new \ArrayIterator;
        $records = new LogRecordIterator($logFileReader, $logFileIterator);
        $this->assertNull($records->key());
        $this->assertFalse($records->current());
        $this->assertInstanceOf('ArrayIterator', $records->getInnerIterator());
    }

    public function testCanIterateThroughRecords()
    {
        $logFileReader = new LogFileReader($this->getMockS3Client());
        $logFileIterator = new \ArrayIterator([
            ['Bucket' => 'test-bucket', 'Key' => 'test-key-1'],
            ['Bucket' => 'test-bucket', 'Key' => 'test-key-2'],
            ['Bucket' => 'test-bucket', 'Key' => 'test-key-3'],
        ]);
        $records = new LogRecordIterator($logFileReader, $logFileIterator);
        $records = iterator_to_array($records);
        $this->assertCount(5, $records);
    }

    /**
     * @return S3Client
     */
    private function getMockS3Client()
    {
        $mock = new Mock([
            new Response(200, [], Stream::factory('{"Records":[{"r1":"r1"},{"r2":"r2"},{"r3":"r3"}]}')),
            new Response(200, [], Stream::factory('{}')),
            new Response(200, [], Stream::factory('{"Records":[{"r4":"r4"},{"r5":"r5"}]}')),
        ]);

        $client = S3Client::factory([
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'region'      => 'foo',
            'version'     => 'latest'
        ]);
        $client->getHttpClient()->getEmitter()->attach($mock);

        return $client;
    }
}
