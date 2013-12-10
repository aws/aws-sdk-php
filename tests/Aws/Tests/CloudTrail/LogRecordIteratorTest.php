<?php

namespace Aws\Tests\CloudTrail;

use Aws\CloudTrail\CloudTrailClient;
use Aws\CloudTrail\LogFileReader;
use Aws\CloudTrail\LogRecordIterator;
use Aws\S3\S3Client;
use Guzzle\Plugin\Mock\MockPlugin;
use Guzzle\Http\Message\Response;

class LogRecordIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\CloudTrail\LogRecordIterator::forTrail
     */
    public function testFactoryCanCreateForTrail()
    {
        $s3Client = $s3Client = S3Client::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
        ));
        $cloudTrailClient = CloudTrailClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-west-2',
        ));
        $json = '{"trailList":[{"IncludeGlobalServiceEvents":true,"Name":"Default","S3BucketName":"log-bucket"}]}';
        $cloudTrailClient->addSubscriber(new MockPlugin(array(new Response(200, null, $json))));

        $records = LogRecordIterator::forTrail($s3Client, $cloudTrailClient);
        $this->assertInstanceOf('Aws\CloudTrail\LogRecordIterator', $records);
    }

    /**
     * @covers Aws\CloudTrail\LogRecordIterator::forBucket
     */
    public function testFactoryCanCreateForBucket()
    {
        $s3Client = $s3Client = S3Client::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
        ));

        $records = LogRecordIterator::forBucket($s3Client, 'test-bucket');
        $this->assertInstanceOf('Aws\CloudTrail\LogRecordIterator', $records);
    }

    /**
     * @covers Aws\CloudTrail\LogRecordIterator::forFile
     */
    public function testFactoryCanCreateForFile()
    {
        $s3Client = $s3Client = S3Client::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
        ));

        $records = LogRecordIterator::forFile($s3Client, 'test-bucket', 'test-key');
        $this->assertInstanceOf('Aws\CloudTrail\LogRecordIterator', $records);
    }

    /**
     * @covers Aws\CloudTrail\LogRecordIterator::__construct
     * @covers Aws\CloudTrail\LogRecordIterator::current
     * @covers Aws\CloudTrail\LogRecordIterator::key
     * @covers Aws\CloudTrail\LogRecordIterator::valid
     * @covers Aws\CloudTrail\LogRecordIterator::getInnerIterator
     */
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

    /**
     * @covers Aws\CloudTrail\LogRecordIterator::loadRecordsFromCurrentLogFile
     * @covers Aws\CloudTrail\LogRecordIterator::current
     * @covers Aws\CloudTrail\LogRecordIterator::key
     * @covers Aws\CloudTrail\LogRecordIterator::next
     * @covers Aws\CloudTrail\LogRecordIterator::rewind
     * @covers Aws\CloudTrail\LogRecordIterator::valid
     */
    public function testCanIterateThroughRecords()
    {
        $logFileReader = new LogFileReader($this->getMockS3Client());
        $logFileIterator = new \ArrayIterator(array(
            array('Bucket' => 'test-bucket', 'Key' => 'test-key-1'),
            array('Bucket' => 'test-bucket', 'Key' => 'test-key-2'),
            array('Bucket' => 'test-bucket', 'Key' => 'test-key-3'),
        ));

        $records = new LogRecordIterator($logFileReader, $logFileIterator);
        $records = iterator_to_array($records);
        $this->assertCount(5, $records);
    }

    /**
     * @return S3Client
     */
    private function getMockS3Client()
    {
        $mock = new MockPlugin(array(
            new Response(200, null, '{"Records":[{"r1":"r1"},{"r2":"r2"},{"r3":"r3"}]}'),
            new Response(200, null, '{}'),
            new Response(200, null, '{"Records":[{"r4":"r4"},{"r5":"r5"}]}'),
        ));
        $client = S3Client::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
        ));
        $client->addSubscriber($mock);

        return $client;
    }
}
