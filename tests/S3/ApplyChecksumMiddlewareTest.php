<?php
namespace Aws\Test\S3;

use Aws\Middleware;
use Aws\Test\UsesServiceTrait;
use Psr\Http\Message\RequestInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\S3\ApplyChecksumMiddleware
 */
class ApplyChecksumMiddlewareTest extends TestCase
{
    use UsesServiceTrait;

    /**
     * @dataProvider getContentMd5UseCases
     */
    public function testAddsContentMd5AsAppropriate($options, $operation, $args, $md5Added, $md5Value)
    {
        $s3 = $this->getTestClient('s3', $options);
        $this->addMockResults($s3, [[]]);
        $command = $s3->getCommand($operation, $args);
        $command->getHandlerList()->appendBuild(
            Middleware::tap(function ($cmd, RequestInterface $request) use ($md5Added, $md5Value) {
                $this->assertSame($md5Added, $request->hasHeader('Content-MD5'));
                $this->assertEquals($md5Value, $request->getHeaderLine('Content-MD5'));
            })
        );
        $s3->execute($command);
    }

    public function getContentMd5UseCases()
    {
        $md5 = '/12roh/ATpPMcGD9Rj4ZlQ==';

        return [
            // Do nothing if Content MD5 was explicitly provided.
            [
                [],
                'DeleteObjects',
                ['Bucket' => 'foo', 'Delete' => ['Objects' => [['Key' => 'bar']]]],
                true,
                $md5
            ],
            // Gets added for operations that require it
            [
                [],
                'DeleteObjects',
                ['Bucket' => 'foo', 'Delete' => ['Objects' => [['Key' => 'bar']]]],
                true,
                $md5
            ],
            // Not added for operations that does not require it
            [
                [],
                'GetObject',
                ['Bucket' => 'foo', 'Key' => 'bar'],
                false,
                null,
            ],
        ];
    }

    /**
     * @dataProvider getContentSha256UseCases
     */
    public function testAddsContentSHA256AsAppropriate($operation, $args, $hashAdded, $hashValue)
    {
        $s3 = $this->getTestClient('s3');
        $this->addMockResults($s3, [[]]);
        $command = $s3->getCommand($operation, $args);
        $command->getHandlerList()->appendBuild(
            Middleware::tap(function ($cmd, RequestInterface $request) use ($hashAdded, $hashValue) {
                $this->assertSame($hashAdded, $request->hasHeader('x-amz-content-sha256'));
                $this->assertEquals($hashValue, $request->getHeaderLine('x-amz-content-sha256'));
            })
        );
        $s3->execute($command);
    }

    public function getContentSha256UseCases()
    {
        $hash = 'SHA256HASH';

        return [
            // Do nothing if ContentSHA256 was not provided.
            [
                'PutObject',
                ['Bucket' => 'foo', 'Key' => 'bar', 'Body' => 'baz'],
                false,
                ''
            ],
            // Gets added for operations that allow it.
            [
                'PutObject',
                ['Bucket' => 'foo', 'Key' => 'bar', 'Body' => 'baz', 'ContentSHA256' => $hash],
                true,
                $hash
            ],
            // Not added for operations that do not allow it.
            [
                'GetObject',
                ['Bucket' => 'foo', 'Key' => 'bar', 'ContentSHA256' => $hash],
                false,
                '',
            ],
        ];
    }
}
