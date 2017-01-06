<?php
namespace Aws\Test\S3\Exception;

use Aws\Command;
use Aws\Exception\AwsException;
use Aws\S3\Exception\S3MultipartUploadException;
use Aws\Multipart\UploadState;

/**
 * @covers Aws\S3\Exception\S3MultipartUploadException
 */
class S3MultipartUploadExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testCanProviderFailedTransferFilePathInfo()
    {
        $state = new UploadState([]);
        $failed = [
            1 => new AwsException('Bad digest.', new Command('UploadPart', [
                'Bucket' => 'foo',
                'Key' => 'bar'
            ])),
            5 => new AwsException('Missing header.', new Command('UploadPart', [
                'Bucket' => 'foo',
                'Key' => 'bar'
            ])),
            8 => new AwsException('Needs more love.', new Command('UploadPart')),
        ];

        $exception = new S3MultipartUploadException($state, $failed);
        $bucket = 'foo';
        $key = 'bar';
        $this->assertEquals($bucket, $exception->getBucket());
        $this->assertEquals($key, $exception->getKey());
    }
}
