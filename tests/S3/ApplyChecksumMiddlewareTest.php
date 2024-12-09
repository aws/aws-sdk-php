<?php
namespace Aws\Test\S3;

use Aws\S3\ApplyChecksumMiddleware;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7\Request;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\S3\ApplyChecksumMiddleware
 */
class ApplyChecksumMiddlewareTest extends TestCase
{
    use UsesServiceTrait;

    /**
     * @dataProvider getFlexibleChecksumUseCases
     */
    public function testFlexibleChecksums(
        $operation,
        $config,
        $commandArgs,
        $body,
        $headerAdded,
        $headerValue
    ){
        if (isset($commandArgs['ChecksumAlgorithm'])
            && $commandArgs['ChecksumAlgorithm'] === 'crc32c'
            && !extension_loaded('awscrt')
        ) {
            $this->markTestSkipped("Cannot test crc32c without the CRT");
        }

        $client = $this->getTestClient('s3');
        $nextHandler = function ($cmd, $request) use ($headerAdded, $headerValue, $commandArgs) {
            $checksumName = $commandArgs['ChecksumAlgorithm'] ?? "crc32";
            if ($headerAdded) {
                $this->assertTrue( $request->hasHeader("x-amz-checksum-{$checksumName}"));
            }
            $this->assertEquals($headerValue, $request->getHeaderLine("x-amz-checksum-{$checksumName}"));
        };
        $service = $client->getApi();
        $mw = new ApplyChecksumMiddleware($nextHandler, $service, $config);
        $command = $client->getCommand($operation, $commandArgs);
        $request = new Request(
            $operation === 'getObject'
                ? 'GET'
                : 'PUT',
            'https://foo.bar',
            [],
            $body
        );

        $mw($command, $request);
    }

    public function getFlexibleChecksumUseCases()
    {
        return [
            // httpChecksum not modeled
            [
                'GetObject',
                [],
                [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'ChecksumMode' => 'ENABLED'
                ],
                null,
                false,
                ''
            ],
            // default: when_supported. defaults to crc32
            [
                'PutObject',
                [],
                [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'Body' => 'abc'
                ],
                'abc',
                true,
                'NSRBwg=='
            ],
            // when_required when not required and no requested algorithm
            [
                'PutObject',
                ['request_checksum_calculation' => 'when_required'],
                [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'Body' => 'abc'
                ],
                'abc',
                false,
                ''
            ],
            // when_required when required and no requested algorithm
            [
                'PutObjectLockConfiguration',
                ['request_checksum_calculation' => 'when_required'],
                [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'ObjectLockConfiguration' => 'blah'
                ],
                'blah',
                true,
                'zilhXA=='
            ],
            // when_required when not required and requested algorithm
            [
                'PutObject',
                ['request_checksum_calculation' => 'when_required'],
                [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'Body' => 'blah',
                    'ChecksumAlgorithm' => 'crc32',
                ],
                'blah',
                true,
                'zilhXA=='
            ],
            // when_supported and requested algorithm
            [
                'PutObject',
                [],
                [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'ChecksumAlgorithm' => 'crc32c',
                    'Body' => 'abc'
                ],
                'abc',
                true,
                'Nks/tw=='
            ],
            // when_supported and requested algorithm
            [
                'PutObject',
                [],
                [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'ChecksumAlgorithm' => 'sha256'
                ],
                '',
                true,
                '47DEQpj8HBSa+/TImW+5JCeuQeRkm5NMpJWZG3hSuFU='
            ],
            // when_supported and requested algorithm
            [
                'PutObject',
                [],
                [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'ChecksumAlgorithm' => 'SHA1'
                ],
                '',
                true,
                '2jmj7l5rSw0yVb/vlWAYkK/YBwk='
            ],
        ];
    }

    /**
     * @dataProvider getContentSha256UseCases
     */
    public function testAddsContentSHA256($operation, $args, $hashAdded, $hashValue)
    {
        $client = $this->getTestClient('s3');
        $nextHandler = function ($cmd, $request) use ($hashAdded, $hashValue) {
            $this->assertSame($hashAdded, $request->hasHeader('x-amz-content-sha256'));
            $this->assertEquals($hashValue, $request->getHeaderLine('x-amz-content-sha256'));
        };
        $service = $client->getApi();
        $mw = new ApplyChecksumMiddleware($nextHandler, $service);
        $command = $client->getCommand($operation, $args);
        $request = new Request('PUT', 'foo');

        $mw($command, $request);
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

    public function testAddContentMd5EmitsDeprecationWarning()
    {
        $this->expectDeprecation();
        $this->expectDeprecationMessage('S3 no longer supports MD5 checksums.');
        $client = $this->getTestClient('s3');
        $nextHandler = function ($cmd, $request) {
            $this->assertTrue($request->hasHeader('x-amz-checksum-crc32'));
        };
        $service = $client->getApi();
        $mw = new ApplyChecksumMiddleware($nextHandler, $service);
        $command = $client->getCommand('putObject', ['AddContentMD5' => true]);
        $request = new Request('PUT', 'foo');

        $mw($command, $request);
    }

    public function testInvalidChecksumThrows()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'Unsupported algorithm supplied for input variable ChecksumAlgorithm'
        );
        $client = $this->getTestClient('s3');
        $nextHandler = function ($cmd, $request) {
            $this->assertTrue($request->hasHeader('x-amz-checksum-crc32'));
        };
        $service = $client->getApi();
        $mw = new ApplyChecksumMiddleware($nextHandler, $service);
        $command = $client->getCommand('putObject', ['ChecksumAlgorithm' => 'NotAnAlgorithm']);
        $request = new Request('PUT', 'foo');

        $mw($command, $request);
    }

    public function testDoesNotCalculateChecksumIfHeaderProvided()
    {
        $client = $this->getTestClient('s3');
        $nextHandler = function ($cmd, $request) {
            $this->assertTrue($request->hasHeader('x-amz-checksum-crc32c'));
            $this->assertEquals('foo', $request->getHeaderLine('x-amz-checksum-crc32c'));
        };
        $service = $client->getApi();
        $mw = new ApplyChecksumMiddleware($nextHandler, $service);
        $command = $client->getCommand('putObject');
        $request = new Request('PUT', 'foo', ['x-amz-checksum-crc32c' => 'foo']);

        $mw($command, $request);
    }
}
