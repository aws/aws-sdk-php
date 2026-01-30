<?php
namespace Aws\Test\Exception;

use Aws\Command;
use Aws\Exception\AwsException;
use Aws\Exception\MultipartUploadException;
use Aws\Multipart\UploadState;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(MultipartUploadException::class)]
class MultipartUploadExceptionTest extends TestCase
{
    #[DataProvider('getTestCases')]
    public function testCanCreateMultipartException($commandName, $status)
    {
        $msg = 'Error encountered while reticulating splines.';
        $state = new UploadState([]);
        $prev = new AwsException($msg, new Command($commandName));
        $exception = new MultipartUploadException($state, $prev);

        $this->assertSame(
            "An exception occurred while {$status} a multipart upload: $msg",
            $exception->getMessage()
        );
        $this->assertSame($state, $exception->getState());
        $this->assertSame($prev, $exception->getPrevious());
    }

    public static function getTestCases(): array
    {
        return [
            ['CreateMultipartUpload', 'initiating'],
            ['InitiateMultipartUpload', 'initiating'],
            ['CompleteMultipartUpload', 'completing'],
            ['OtherCommands', 'performing'],
        ];
    }

    public function testCanCreateExceptionListingFailedParts()
    {
        $state = new UploadState([]);
        $failed = [
            1 => new AwsException('Bad digest.', new Command('UploadPart')),
            5 => new AwsException('Missing header.', new Command('UploadPart')),
            8 => new AwsException('Needs more love.', new Command('UploadPart')),
        ];

        $exception = new MultipartUploadException($state, $failed);

        $expected = <<<MSG
An exception occurred while uploading parts to a multipart upload. The following parts had errors:
- Part 1: Bad digest.
- Part 5: Missing header.
- Part 8: Needs more love.

MSG;
        //Normalize line endings to \n for Windows
        $expected = str_replace("\r\n", "\n", $expected);
        $this->assertSame($expected, $exception->getMessage());
    }
}
