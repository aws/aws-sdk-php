<?php

namespace Aws\Tests\CloudTrail;

use Aws\CloudTrail\CloudTrailClient;
use Aws\CloudTrail\LogRecordIterator;
use Aws\S3\S3Client;
use Guzzle\Plugin\Mock\MockPlugin;
use Guzzle\Http\Message\Response;

class LogRecordIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\CloudTrail\LogRecordIterator::factory
     */
    public function testFactoryCloudTrailClientProvided()
    {
        $cloudtrail = CloudTrailClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-west-2',
        ));
        $records = LogRecordIterator::factory(array(
            'CloudTrailClient' => $cloudtrail,
            'S3BucketName'     => 'test',
        ));
        $this->assertInstanceOf('Aws\CloudTrail\LogRecordIterator', $records);
    }

    /**
     * @covers Aws\CloudTrail\LogRecordIterator::factory
     */
    public function testFactoryS3ClientProvided()
    {
        $s3 = S3Client::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
        ));
        $records = LogRecordIterator::factory(array(
            'S3Client'     => $s3,
            'S3BucketName' => 'test',
        ));
        $this->assertInstanceOf('Aws\CloudTrail\LogRecordIterator', $records);
    }

    /**
     * @covers Aws\CloudTrail\LogRecordIterator::factory
     */
    public function testFactoryErrorsOnMissingClients()
    {
        $this->setExpectedException('InvalidArgumentException');
        LogRecordIterator::factory();
    }

    /**
     * @covers Aws\CloudTrail\LogRecordIterator::factory
     */
    public function testFactoryCanGetBucketFromTrail()
    {
        $cloudtrail = CloudTrailClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-west-2',
        ));
        $json = '{"trailList":[{"IncludeGlobalServiceEvents":true,"Name":"Default","S3BucketName":"php-17364133299065-cloudtrail"}]}';
        $cloudtrail->addSubscriber(new MockPlugin(array(new Response(200, null, $json))));
        $records = LogRecordIterator::factory(array(
            'CloudTrailClient' => $cloudtrail,
        ));
        $this->assertInstanceOf('Aws\CloudTrail\LogRecordIterator', $records);
    }

    /**
     * @covers Aws\CloudTrail\LogRecordIterator::factory
     */
    public function testFactoryErrorsOnMissingBucket()
    {
        $this->setExpectedException('InvalidArgumentException');
        $cloudtrail = CloudTrailClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-west-2',
        ));
        $cloudtrail->addSubscriber(new MockPlugin(array(new Response(200, null, '{"trailList":[]}'))));
        LogRecordIterator::factory(array(
            'CloudTrailClient' => $cloudtrail,
        ));
    }

    /**
     * @covers Aws\CloudTrail\LogRecordIterator::__construct
     * @covers Aws\CloudTrail\LogRecordIterator::prepareIterator
     * @covers Aws\CloudTrail\LogRecordIterator::fetchDateValue
     * @covers Aws\CloudTrail\LogRecordIterator::applyRegexFilter
     * @covers Aws\CloudTrail\LogRecordIterator::applyDateFilter
     */
    public function testConstructorWorksWithMinimumParams()
    {
        $s3Client = $this->getMockS3Client();
        $records = new LogRecordIterator($s3Client, array(
            'S3BucketName' => 'test-bucket',
        ));

        $this->assertInstanceOf('Aws\CloudTrail\LogRecordIterator', $records);
    }

    /**
     * @covers Aws\CloudTrail\LogRecordIterator::__construct
     * @covers Aws\CloudTrail\LogRecordIterator::fetchDateValue
     * @covers Aws\CloudTrail\LogRecordIterator::applyDateFilter
     */
    public function testConstructorWorksWithDates()
    {
        $s3Client = $this->getMockS3Client();
        $records = new LogRecordIterator($s3Client, array(
            'S3BucketName' => 'test-bucket',
            'StartDate'    => new \DateTime('2013-11-01'),
            'EndDate'      => '2013-12-01',
        ));

        $this->assertInstanceOf('Aws\CloudTrail\LogRecordIterator', $records);
    }

    /**
     * @covers Aws\CloudTrail\LogRecordIterator::__construct
     * @covers Aws\CloudTrail\LogRecordIterator::applyDateFilter
     * @covers Aws\CloudTrail\LogRecordIterator::applyRegexFilter
     * @covers Aws\CloudTrail\LogRecordIterator::loadRecordsFromObject
     * @covers Aws\CloudTrail\LogRecordIterator::current
     * @covers Aws\CloudTrail\LogRecordIterator::key
     * @covers Aws\CloudTrail\LogRecordIterator::next
     * @covers Aws\CloudTrail\LogRecordIterator::rewind
     * @covers Aws\CloudTrail\LogRecordIterator::valid
     */
    public function testCanIterateThroughRecords()
    {
        $s3Client = $this->getMockS3Client();
        $records = new LogRecordIterator($s3Client, array(
            'S3BucketName' => 'test-bucket',
            'StartDate'    => new \DateTime('2013-11-01'),
            'EndDate'      => '2013-12-01',
        ));

        $records = iterator_to_array($records);
        $this->assertCount(6, $records);
    }

    /**
     * @covers Aws\CloudTrail\LogRecordIterator::__construct
     * @covers Aws\CloudTrail\LogRecordIterator::fetchDateValue
     */
    public function testConstructorErrorsOnInvalidDate()
    {
        $this->setExpectedException('InvalidArgumentException');

        $s3Client = $this->getMockS3Client();
        $records = new LogRecordIterator($s3Client, array(
            'S3BucketName' => 'test-bucket',
            'StartDate'    => true,
            'EndDate'      => false,
        ));
    }

    /**
     * @covers Aws\CloudTrail\LogRecordIterator::current
     * @covers Aws\CloudTrail\LogRecordIterator::key
     * @covers Aws\CloudTrail\LogRecordIterator::valid
     */
    public function testIteratorBehavesCorrectlyBeforeRewind()
    {
        $s3Client = $this->getMockS3Client();
        $records = new LogRecordIterator($s3Client, array(
            'S3BucketName' => 'test-bucket',
        ));

        $this->assertNull($records->key());
        $this->assertFalse($records->current());
    }

    /**
     * @return Response
     */
    private function getMockS3Client()
    {
        // Setup ListObjects response
        $json = '{"Records":[{"foo":"1"},{"bar":"2"},{"baz":"3"}]}';
        $xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<ListBucketResult xmlns="http://s3.amazonaws.com/doc/2006-03-01/">
    <Name>test-bucket</Name>
    <Prefix/>
    <Marker/>
    <MaxKeys>1000</MaxKeys>
    <IsTruncated>false</IsTruncated>
    <Contents>
        <Key>AWSLogs/12345/CloudTrail/us-east-1/2013/11/15/foo-20131115T1453Z-log.json.gz</Key>
    </Contents>
    <Contents>
        <Key>AWSLogs/12345/CloudTrail/us-east-1/2013/11/28/foo-20131128T1822Z-log.json.gz</Key>
    </Contents>
    <Contents>
        <Key>AWSLogs/12345/CloudTrail/us-east-1/2013/12/01/foo-20131201T0311Z-log.json.gz</Key>
    </Contents>
    <Contents>
        <Key>AWSLogs/12345/CloudTrail/us-east-1/2013/12/01/foo-20131225T0000Z-log.json.gz</Key>
    </Contents>
</ListBucketResult>
XML;

        $mock = new MockPlugin(array(
            new Response(200, null, $xml),  // ListObjects: 4 log files
            new Response(200, null, $json), // GetObject: File with 3 log records
            new Response(200, null, '{}'),  // GetObject: File with 0 log records
            new Response(200, null, $json), // GetObject: File with 3 log records
            new Response(200, null, $json), // GetObject: File with 3 log records, but is out of the date range
        ));
        $client = S3Client::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
        ));
        $client->addSubscriber($mock);

        return $client;
    }
}
