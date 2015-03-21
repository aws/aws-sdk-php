<?php
namespace Aws\Test\Integ\Multipart;

use Aws\Exception\MultipartUploadException;
use Aws\S3\ClearBucket;
use Aws\S3\UploadBuilder;
use Aws\Test\Integ\IntegUtils;
use GuzzleHttp\Stream\NoSeekStream;
use GuzzleHttp\Stream\Stream;

class S3Multipart extends \PHPUnit_Framework_TestCase
{
    use IntegUtils;

    const MB = 1048576;
    const BUCKET = 'php-integ-s3multipart-test';

    public static function setUpBeforeClass()
    {
        $client = self::getSdk()->createS3();
        if (!$client->doesBucketExist(self::BUCKET)) {
            $client->createBucket(['Bucket' => self::BUCKET]);
            $client->waitUntil('BucketExists', ['Bucket' => self::BUCKET]);
        }
    }

    public static function tearDownAfterClass()
    {
        $client = self::getSdk()->createS3();
        (new ClearBucket($client, self::BUCKET))->clear();
        $client->deleteBucket(['Bucket' => self::BUCKET]);
    }

    public function useCasesProvider()
    {
        return [
            ['SeekableSerialUpload', true, 1],
            ['NonSeekableSerialUpload', false, 3],
            ['SeekableConcurrentUpload', true, 1],
            ['NonSeekableConcurrentUpload', false, 3],
        ];
    }

    /**
     * @param string $key
     * @param bool   $seekable
     * @param int    $concurrency
     * @dataProvider useCasesProvider
     */
    public function testMultipartUpload($key, $seekable, $concurrency)
    {
        // Create a temp file
        $client = self::getSdk()->createS3();
        $tmpFile = sys_get_temp_dir() . '/aws-php-sdk-integ-s3-mup';
        file_put_contents($tmpFile, str_repeat('x', 10 * self::MB + 1024));

        // Create a stream
        $stream = Stream::factory(fopen($tmpFile, 'r'));
        if (!$seekable) {
            $stream = new NoSeekStream($stream);
        }

        // Create the uploader
        $uploader = (new UploadBuilder)
            ->setClient($client)
            ->setBucket(self::BUCKET)
            ->setKey($key)
            ->setSource($stream)
            ->setPartSize(5 * self::MB)
            ->build();

        // Perform the upload
        try {
            $result = $uploader->upload($concurrency);
            $this->assertArrayHasKey('ObjectURL', $result);
        } catch (MultipartUploadException $e) {
            $uploader->abort();
            $message = "=====\n";
            while ($e) {
                $message .= $e->getMessage() . "\n";
                $e = $e->getPrevious();
            }
            $message .= "=====\n";
            $this->fail($message);
        }

        @unlink($tmpFile);
    }
}
