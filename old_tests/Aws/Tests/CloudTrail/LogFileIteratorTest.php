<?php

namespace Aws\Tests\CloudTrail;

use Aws\CloudTrail\CloudTrailClient;
use Aws\CloudTrail\LogFileIterator;
use Aws\S3\S3Client;
use Guzzle\Plugin\Mock\MockPlugin;
use Guzzle\Http\Message\Response;

class LogFileIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\CloudTrail\LogFileIterator::forTrail
     */
    public function testFactoryCanCreateForTrail()
    {
        $s3Client = $this->getMockS3Client();
        $cloudTrailClient = CloudTrailClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-west-2',
        ));
        $json = '{"trailList":[{"IncludeGlobalServiceEvents":true,"Name":"Default","S3BucketName":"log-bucket"}]}';
        $cloudTrailClient->addSubscriber(new MockPlugin(array(new Response(200, null, $json))));
        $files = LogFileIterator::forTrail($s3Client, $cloudTrailClient);
        $this->assertInstanceOf('Aws\CloudTrail\LogFileIterator', $files);
    }

    /**
     * @covers Aws\CloudTrail\LogFileIterator::forTrail
     */
    public function testFactoryErrorsOnUnknownBucket()
    {
        $this->setExpectedException('InvalidArgumentException');
        $s3Client = $this->getMockS3Client();
        $cloudTrailClient = CloudTrailClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-west-2',
        ));
        $cloudTrailClient->addSubscriber(new MockPlugin(array(new Response(200, null, '{"trailList":[]}'))));
        $files = LogFileIterator::forTrail($s3Client, $cloudTrailClient);
    }

    /**
     * @covers Aws\CloudTrail\LogFileIterator::__construct
     * @covers Aws\CloudTrail\LogFileIterator::buildListObjectsIterator
     */
    public function testConstructorWorksWithMinimumParams()
    {
        $s3Client = $this->getMockS3Client();
        $files = new LogFileIterator($s3Client, 'test-bucket');

        $this->assertInstanceOf('Aws\CloudTrail\LogFileIterator', $files);
    }

    /**
     * @covers Aws\CloudTrail\LogFileIterator::normalizeDateValue
     * @covers Aws\CloudTrail\LogFileIterator::determineDateForPrefix
     * @covers Aws\CloudTrail\LogFileIterator::applyDateFilter
     */
    public function testConstructorWorksWithDates()
    {
        $s3Client = $this->getMockS3Client();
        $files = new LogFileIterator($s3Client, 'test-bucket', array(
            LogFileIterator::START_DATE => new \DateTime('2013-11-01'),
            LogFileIterator::END_DATE   => '2013-12-01',
        ));

        $this->assertInstanceOf('Aws\CloudTrail\LogFileIterator', $files);
    }

    /**
     * @covers Aws\CloudTrail\LogFileIterator::normalizeDateValue
     */
    public function testConstructorErrorsOnInvalidDate()
    {
        $this->setExpectedException('InvalidArgumentException');

        $s3Client = $this->getMockS3Client();
        $files = new LogFileIterator($s3Client, 'test-bucket', array(
            LogFileIterator::START_DATE => true,
            LogFileIterator::END_DATE   => false,
        ));
    }

    /**
     * @covers Aws\CloudTrail\LogFileIterator::applyDateFilter
     * @covers Aws\CloudTrail\LogFileIterator::applyRegexFilter
     * @covers Aws\CloudTrail\LogFileIterator::current
     */
    public function testCanIterateThroughFiles()
    {
        $s3Client = $this->getMockS3Client();
        $files = new LogFileIterator($s3Client, 'test-bucket', array(
            LogFileIterator::START_DATE => new \DateTime('2013-11-01'),
            LogFileIterator::END_DATE   => '2013-12-01',
        ));

        $innerIterator = $files->getInnerIterator();
        $this->assertInstanceOf('Guzzle\Iterator\FilterIterator', $innerIterator);

        $this->assertFalse($files->current());
        $files = iterator_to_array($files);
        $this->assertCount(3, $files, print_r($files, true));
    }

    /**
     * @return S3Client
     */
    private function getMockS3Client()
    {
        // Setup ListObjects response
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
        <Key>AWSLogs/12345/CloudTrail/us-east-1/2013/12/01/foo-20131129T0311Z-log.json.gz</Key>
    </Contents>
    <Contents>
        <Key>AWSLogs/12345/CloudTrail/us-east-1/2013/12/01/foo-20131225T0000Z-log.json.gz</Key>
    </Contents>
</ListBucketResult>
XML;

        $client = S3Client::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
        ));
        $client->addSubscriber(new MockPlugin(array(new Response(200, null, $xml))));

        return $client;
    }
}
