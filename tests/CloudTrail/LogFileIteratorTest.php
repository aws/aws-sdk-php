<?php
namespace Aws\Test\CloudTrail;

use Aws\Api\Parser\RestXmlParser;
use Aws\CloudTrail\CloudTrailClient;
use Aws\CloudTrail\LogFileIterator;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\CloudTrail\LogFileIterator
 */
class LogFileIteratorTest extends TestCase
{
    use UsesServiceTrait;

    public function testFactoryCanCreateForTrail()
    {
        $s3Client = $this->getMockS3Client();
        $cloudTrailClient = new CloudTrailClient([
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'region'      => 'us-west-2',
            'version'     => 'latest'
        ]);
        $json = '{"trailList":[{"IncludeGlobalServiceEvents":true,"Name":"Default","S3BucketName":"log-bucket"}]}';
        $this->addMockResults($cloudTrailClient, [new Result(json_decode($json, true))]);
        $files = LogFileIterator::forTrail($s3Client, $cloudTrailClient);
        $this->assertInstanceOf('Aws\CloudTrail\LogFileIterator', $files);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testFactoryErrorsOnUnknownBucket()
    {
        $s3Client = $this->getMockS3Client();
        $cloudTrailClient = CloudTrailClient::factory([
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'version'     => 'latest',
            'region'      => 'us-west-2',
        ]);
        $this->addMockResults($cloudTrailClient, [
            new Result(['trailList' => []])
        ]);
        $files = LogFileIterator::forTrail($s3Client, $cloudTrailClient);
    }

    public function testConstructorWorksWithMinimumParams()
    {
        $s3Client = $this->getMockS3Client();
        $files = new LogFileIterator($s3Client, 'test-bucket');
        $this->assertInstanceOf('Aws\CloudTrail\LogFileIterator', $files);
    }

    public function testConstructorWorksWithDates()
    {
        $s3Client = $this->getMockS3Client();
        $files = new LogFileIterator($s3Client, 'test-bucket', [
            LogFileIterator::START_DATE => new \DateTime('2013-11-01'),
            LogFileIterator::END_DATE   => '2013-12-01',
        ]);
        $this->assertInstanceOf('Aws\CloudTrail\LogFileIterator', $files);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testConstructorErrorsOnInvalidDate()
    {
        $s3Client = $this->getMockS3Client();
        new LogFileIterator($s3Client, 'test-bucket', [
            LogFileIterator::START_DATE => true,
            LogFileIterator::END_DATE   => false,
        ]);
    }

    public function testCanIterateThroughFiles()
    {
        $s3Client = $this->getMockS3Client();
        $files = new LogFileIterator($s3Client, 'test-bucket', [
            LogFileIterator::START_DATE => new \DateTime('2013-11-01'),
            LogFileIterator::END_DATE   => '2013-12-01',
        ]);

        $innerIterator = $files->getInnerIterator();
        $this->assertInstanceOf('CallbackFilterIterator', $innerIterator);
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
        <Key>AWSLogs/12345/CloudTrail/us-east-1/2013/11/15/foo-20131115TFILTERME-log.json.gz</Key>
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

        $client = new S3Client([
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'region'      => 'us-east-1',
            'version'     => 'latest'
        ]);

        $command = $client->getCommand('ListObjects');
        $parser = new RestXmlParser($client->getApi());
        $response = new Response(200, [], $xml);
        $this->addMockResults($client, [$parser($command, $response)]);

        return $client;
    }
}
