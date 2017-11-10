<?php
namespace Aws\Test\CloudTrail;

use Aws\Result;
use Aws\S3\S3Client;
use Aws\CloudTrail\CloudTrailClient;
use Aws\CloudTrail\LogFileReader;
use Aws\CloudTrail\LogRecordIterator;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\CloudTrail\LogRecordIterator
 */
class LogRecordIteratorTest extends TestCase
{
    use UsesServiceTrait;

    public function testFactoryCanCreateForTrail()
    {
        $s3 = new S3Client([
            'region'      => 'us-east-1',
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'version'     => 'latest'
        ]);
        $cloudTrailClient = new CloudTrailClient([
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'region'      => 'us-west-2',
            'version'     => 'latest'
        ]);
        $this->addMockResults($cloudTrailClient, [
            new Result([
                'trailList' => [
                    [
                        'IncludeGlobalServiceEvents' => true,
                        'Name' => 'Default',
                        'S3BucketName' => 'log-bucket'
                    ]
                ]
            ])
        ]);
        $records = LogRecordIterator::forTrail($s3, $cloudTrailClient);
        $this->assertInstanceOf('Aws\CloudTrail\LogRecordIterator', $records);
    }

    public function testFactoryCanCreateForBucket()
    {
        $s3 = new S3Client([
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'region'      => 'us-east-1',
            'version'     => 'latest'
        ]);
        $records = LogRecordIterator::forBucket($s3, 'test-bucket');
        $this->assertInstanceOf('Aws\CloudTrail\LogRecordIterator', $records);
    }

    public function testFactoryCanCreateForFile()
    {
        $s3 = new S3Client([
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'region'      => 'us-east-1',
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
        $client = new S3Client([
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'region'      => 'foo',
            'version'     => 'latest'
        ]);

        $this->addMockResults($client, [
            new Result(['Body' => Psr7\stream_for('{"Records":[{"r1":"r1"},{"r2":"r2"},{"r3":"r3"}]}')]),
            new Result(['Body' => Psr7\stream_for('{}')]),
            new Result(['Body' => Psr7\stream_for('{"Records":[{"r4":"r4"},{"r5":"r5"}]}')]),
        ]);

        return $client;
    }
}
