<?php
namespace Aws\Test\Integ;

use Aws\Exception\MultipartUploadException;
use Aws\S3\BatchDelete;
use Aws\S3\MultipartUploader;
use GuzzleHttp\Psr7\NoSeekStream;
use GuzzleHttp\Psr7;

class S3Multipart extends \PHPUnit_Framework_TestCase
{
    use IntegUtils;

    const MB = 1048576;
    const BUCKET = 'php-s3-integration-multipart-test';

    public static function setUpBeforeClass()
    {
        $client = self::getSdk()->createS3();
        if (!$client->doesBucketExist(self::getBucketName())) {
            $client->createBucket(['Bucket' => self::getBucketName()]);
            $client->waitUntil('BucketExists', ['Bucket' => self::getBucketName()]);
        }
    }

    public static function tearDownAfterClass()
    {
        $client = self::getSdk()->createS3();
        BatchDelete::fromListObjects($client, ['Bucket' => self::getBucketName()])->delete();
        $client->deleteBucket(['Bucket' => self::getBucketName()]);
        $client->waitUntil('BucketNotExists', ['Bucket' => self::getBucketName()]);
    }

    public function useCasesProvider()
    {
        return [
            ['SeekableSerialUpload', true, 1],
            ['NonSeekableSerialUpload', false, 1],
            ['SeekableConcurrentUpload', true, 3],
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
        $stream = Psr7\stream_for(fopen($tmpFile, 'r'));
        if (!$seekable) {
            $stream = new NoSeekStream($stream);
        }

        // Create the uploader
        $uploader = new MultipartUploader($client, $stream, [
            'bucket'      => self::getBucketName(),
            'key'         => $key,
            'concurrency' => $concurrency
        ]);

        // Perform the upload
        try {
            $result = $uploader->upload();
            $this->assertArrayHasKey('ObjectURL', $result);
        } catch (MultipartUploadException $e) {
            $client->abortMultipartUpload($e->getState()->getId());
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


    private static function getBucketName()
    {
        static $bucketName;

        if (empty($bucketName)) {
            $bucketName = self::getResourcePrefix() . self::BUCKET;
        }

        return $bucketName;
    }
}
