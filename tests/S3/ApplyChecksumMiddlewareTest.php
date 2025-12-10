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
            'http_checksum_not_modeled' => [
                'operation' => 'GetObject',
                'config' => [],
                'command_args' => [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'ChecksumMode' => 'ENABLED'
                ],
                'body' => null,
                'headers_added' => false,
                'header_value' => ''
            ],
            'default_when_supported_defaults_to_crc32' => [
                'operation' => 'PutObject',
                'config' => [],
                'command_args' => [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'Body' => 'abc'
                ],
                'body' => 'abc',
                'headers_added' => true,
                'header_value' => 'NSRBwg=='
            ],
            'when_required_when_not_required_and_no_requested_algorithm' => [
                'operation' => 'PutObject',
                'config' => ['request_checksum_calculation' => 'when_required'],
                'command_args' => [],
                'body' => 'abc',
                'headers_added' => false,
                'header_value' => ''
            ],
            'when_required_when_required_and_no_requested_algorithm' => [
                'operation' => 'PutObjectLockConfiguration',
                'config' => ['request_checksum_calculation' => 'when_required'],
                'command_args' => [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'ObjectLockConfiguration' => 'blah'
                ],
                'body' => 'blah',
                'headers_added' => true,
                'header_value' => 'zilhXA=='
            ],
            'when_required_when_not_required_and_requested_algorithm' => [
                'operation' => 'PutObject',
                'config' => ['request_checksum_calculation' => 'when_required'],
                'command_args' => [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'Body' => 'blah',
                    'ChecksumAlgorithm' => 'crc32',
                ],
                'body' => 'blah',
                'headers_added' => true,
                'header_value' => 'zilhXA=='
            ],
            'when_supported_and_requested_algorithm_1' => [
                'operation' => 'PutObject',
                'config' => [],
                'command_args' => [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'ChecksumAlgorithm' => 'crc32c',
                    'Body' => 'abc'
                ],
                'body' => 'abc',
                'headers_added' => true,
                'header_value' => 'Nks/tw=='
            ],
            'when_supported_and_requested_algorithm_2' => [
                'operation' => 'PutObject',
                'config' => [],
                'command_args' => [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'ChecksumAlgorithm' => 'sha256'
                ],
                'body' => '',
                'headers_added' => true,
                'header_value' => '47DEQpj8HBSa+/TImW+5JCeuQeRkm5NMpJWZG3hSuFU='
            ],
            'when_supported_and_requested_algorithm_3' => [
                'operation' => 'PutObject',
                'config' => [],
                'command_args' => [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'ChecksumAlgorithm' => 'SHA1'
                ],
                'body' => '',
                'headers_added' => true,
                'header_value' => '2jmj7l5rSw0yVb/vlWAYkK/YBwk='
            ],
            'when_required_when_not_required_and_no_requested_algorithm_from_command_args' => [
                'operation' => 'PutObject',
                'config' => [],
                'command_args' => [
                    '@context' => [
                        'request_checksum_calculation' => 'when_required'
                    ]
                ],
                'body' => 'abc',
                'headers_added' => false,
                'header_value' => ''
            ],
            'when_required_when_required_and_no_requested_algorithm_from_command_args' => [
                'operation' => 'PutObjectLockConfiguration',
                'config' => [],
                'command_args' => [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'ObjectLockConfiguration' => 'blah',
                    '@context' => [
                        'request_checksum_calculation' => 'when_required'
                    ]
                ],
                'body' => 'blah',
                'headers_added' => true,
                'header_value' => 'zilhXA=='
            ],
            'when_required_when_not_required_and_requested_algorithm_from_command_args' => [
                'operation' => 'PutObject',
                'config' => [],
                'command_args' => [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'Body' => 'blah',
                    'ChecksumAlgorithm' => 'crc32',
                    '@context' => [
                        'request_checksum_calculation' => 'when_required'
                    ]
                ],
                'body' => 'blah',
                'headers_added' => true,
                'header_value' => 'zilhXA=='
            ]
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
