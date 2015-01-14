<?php
namespace Aws\Test\Exception;

use Aws\Exception\MultipartUploadException;
use Aws\Multipart\UploadState;

/**
 * @covers Aws\Exception\MultipartUploadException
 */
class MultipartUploadExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testCanCreateSimpleException()
    {
        $state = new UploadState([]);
        $prev = new \InvalidArgumentException('TEST');
        $exception = new MultipartUploadException($state, 'DOING STUFF WITH', $prev);

        $this->assertEquals(
            'An exception occurred while DOING STUFF WITH a multipart upload.',
            $exception->getMessage()
        );
        $this->assertSame($state, $exception->getState());
        $this->assertSame($prev, $exception->getPrevious());
    }

    public function testCanCreateExceptionListingFailedParts()
    {
        $state = new UploadState([]);
        $prev = new \InvalidArgumentException('TEST');
        $failed = [
            1 => 'Bad digest.',
            5 => 'Missing header.',
            8 => 'Needs more love.',
        ];

        $exception = new MultipartUploadException($state, $failed, $prev);

        $expected = <<<MSG
An exception occurred while uploading parts to a multipart upload. The following parts had errors:
- Part 1: Bad digest.
- Part 5: Missing header.
- Part 8: Needs more love.

MSG;

        $this->assertEquals($expected, $exception->getMessage());
    }
}
