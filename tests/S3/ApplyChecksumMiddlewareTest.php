<?php
namespace Aws\Test\S3;

use Aws\Api\ApiProvider;
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
    public function testAddsContentMd5AsAppropriate($operation, $args, $md5Added, $md5Value)
    {
        $s3 = $this->getTestClient(
            's3',
            ['api_provider' => ApiProvider::filesystem(__DIR__ . '/fixtures')]
        );
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
        return [
            // Test that explicitly proviced Content MD5 is passed through
            [
                'PutBucketLogging',
                [
                    'Bucket' => 'foo',
                    'BucketLoggingStatus' => [
                        'LoggingEnabled' => [
                            'TargetBucket' => 'bar',
                            'TargetPrefix' => 'baz'
                        ]
                    ],
                    'ContentMD5' => 'custommd5'
                ],
                true,
                'custommd5'
            ],
            // Test MD5 added for operations that require it
            [
                'DeleteObjects',
                ['Bucket' => 'foo', 'Delete' => ['Objects' => [['Key' => 'bar']]]],
                true,
                '/12roh/ATpPMcGD9Rj4ZlQ=='
            ],
            // Test MD5 not added for operations that do not require it
            [
                'GetObject',
                ['Bucket' => 'foo', 'Key' => 'bar'],
                false,
                null,
            ],
        ];
    }

    /**
     * @dataProvider getFlexibleChecksumUseCases
     */
    public function testAddsFlexibleChecksumAsAppropriate($operation, $args, $headerAdded, $headerValue)
    {
        if (isset($args['ChecksumAlgorithm'])
            && $args['ChecksumAlgorithm'] === 'crc32c'
            && !extension_loaded('awscrt')
        ) {
            $this->markTestSkipped("Cannot test crc32c without the CRT");
        }
        $s3 = $this->getTestClient(
            's3',
            ['api_provider' => ApiProvider::filesystem(__DIR__ . '/fixtures')]
        );
        $this->addMockResults($s3, [[]]);
        $command = $s3->getCommand($operation, $args);
        $command->getHandlerList()->appendBuild(
            Middleware::tap(function ($cmd, RequestInterface $request) use ($headerAdded, $headerValue, $args) {
                $checksumName = isset($args['ChecksumAlgorithm']) ? $args['ChecksumAlgorithm'] : "";
                $this->assertSame($headerAdded, $request->hasHeader("x-amz-checksum-{$checksumName}"));
                $this->assertEquals($headerValue, $request->getHeaderLine("x-amz-checksum-{$checksumName}"));
            })
        );
        $s3->execute($command);
    }

    public function getFlexibleChecksumUseCases()
    {
        return [
            // Test that explicitly proviced Content MD5 is passed through
            [
                'GetObject',
                [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'ChecksumMode' => 'ENABLED'
                ],
                false,
                ''
            ],
            [
                'PutObject',
                [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'ChecksumAlgorithm' => 'crc32',
                    'Body' => 'abc'
                ],
                true,
                'EZo2zw=='
            ],
            [
                'PutObject',
                [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'ChecksumAlgorithm' => 'crc32c',
                    'Body' => 'abc'
                ],
                true,
                'oD04yw=='
            ],
            [
                'PutObject',
                [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'ChecksumAlgorithm' => 'sha256'
                ],
                true,
                'OmJVpLQxEjty3SMySBLGRfWtoBQ/ZXT2cT2Cjuly4XY='
            ],
            [
                'PutObject',
                [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'ChecksumAlgorithm' => 'SHA1'
                ],
                true,
                'KckkIVRT7cC010EHaNNNuun5VBY='
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
