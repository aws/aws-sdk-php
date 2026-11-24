<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Checksum;

use Aws\Core\Checksum\FlexibleChecksumPlugin;
use Aws\Core\Checksum\FlexibleChecksumRequestInterceptor;
use Aws\Core\Checksum\FlexibleChecksumResponseInterceptor;
use Aws\Core\Checksum\RequestChecksumCalculation;
use Aws\Tests\Core\Checksum\Utils\ChecksumTestClient;
use Aws\Tests\Utils\Http\GenericPsrRequest;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Smithy\Client\Interceptor\RequestCompressionInterceptor;
use Smithy\Client\Interceptor\RequestContext;
use Smithy\Client\Plugin\RequestCompressionPlugin;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Http\Message\HttpTransportRequest;
use Smithy\Http\Message\Request;
use Smithy\Http\Message\ResourceRequestStream;

final class FlexibleChecksumRequestInterceptorTest extends TestCase
{
    private ChecksumTestClient $client;

    protected function setUp(): void
    {
        $this->client = ChecksumTestClient::forModel();
    }

    public function testCalculatesDefaultCrc32ForRequiredOperation(): void
    {
        $updated = $this->interceptModeled(
            RequestChecksumCalculation::WHEN_REQUIRED,
            'RequiredChecksum',
            null,
            new Request('POST', 'https://example.test', [], 'Hello world')
        );

        $this->assertSame(
            'i9aeUg==',
            $updated->getHeaderLine('x-amz-checksum-crc32')
        );
        $this->assertSame(
            'CRC32',
            $updated->getHeaderLine('x-amz-request-algorithm')
        );
    }

    public function testCalculatesChecksumForGenericPsrRequest(): void
    {
        $updated = $this->interceptModeled(
            RequestChecksumCalculation::WHEN_REQUIRED,
            'RequiredChecksum',
            null,
            new GenericPsrRequest(new Request(
                'POST',
                'https://example.test',
                [],
                'Hello world',
            )),
        );

        $this->assertInstanceOf(GenericPsrRequest::class, $updated);
        $this->assertSame(
            'i9aeUg==',
            $updated->getHeaderLine('x-amz-checksum-crc32'),
        );
        $this->assertSame(
            'CRC32',
            $updated->getHeaderLine('x-amz-request-algorithm'),
        );
    }

    public function testUsesRequestedAlgorithm(): void
    {
        $updated = $this->interceptModeled(
            RequestChecksumCalculation::WHEN_REQUIRED,
            'RequiredChecksum',
            'SHA256',
            new Request(
                'POST',
                'https://example.test',
                ['x-amz-request-algorithm' => 'SHA256'],
                'Hello world'
            )
        );

        $this->assertSame(
            'ZOyIygCyaOW6GjVnihtTFtIS9PNmskdyMlNKiuyjfzw=',
            $updated->getHeaderLine('x-amz-checksum-sha256')
        );
        $this->assertSame(
            'SHA256',
            $updated->getHeaderLine('x-amz-request-algorithm')
        );
    }

    public function testResolvesModeledRequestAlgorithmMetadata(): void
    {
        $operation = $this->client->operation('StreamingChecksum');
        $updated = $this->intercept(
            RequestChecksumCalculation::WHEN_SUPPORTED,
            $operation,
            $operation->createInputFromValue(['ChecksumAlgorithm' => 'SHA256']),
            new Request(
                'PUT',
                'https://example.test/bucket/key',
                [],
                'Hello world'
            )
        );

        $this->assertSame(
            \base64_encode(\hash('sha256', 'Hello world', true)),
            $updated->getHeaderLine('x-amz-checksum-sha256')
        );
    }

    public function testWhenRequiredSkipsOptionalChecksum(): void
    {
        $request = new Request(
            'POST',
            'https://example.test',
            [],
            'Hello world'
        );

        $updated = $this->interceptModeled(
            RequestChecksumCalculation::WHEN_REQUIRED,
            'OptionalChecksum',
            null,
            $request
        );

        $this->assertSame($request, $updated);
    }

    public function testWhenSupportedCalculatesOptionalChecksum(): void
    {
        $updated = $this->interceptModeled(
            RequestChecksumCalculation::WHEN_SUPPORTED,
            'OptionalChecksum',
            null,
            new Request('POST', 'https://example.test', [], 'Hello world')
        );

        $this->assertSame(
            'i9aeUg==',
            $updated->getHeaderLine('x-amz-checksum-crc32')
        );
    }

    public function testWhenSupportedSkipsResponseOnlyOperation(): void
    {
        $request = new Request('GET', 'https://example.test/response');

        $updated = $this->interceptModeled(
            RequestChecksumCalculation::WHEN_SUPPORTED,
            'ResponseChecksum',
            null,
            $request
        );

        $this->assertSame($request, $updated);
        $this->assertFalse($updated->hasHeader('x-amz-checksum-crc32'));
    }

    public function testUserProvidedChecksumIsPreserved(): void
    {
        $updated = $this->interceptModeled(
            RequestChecksumCalculation::WHEN_SUPPORTED,
            'RequiredChecksum',
            'SHA256',
            new Request(
                'POST',
                'https://example.test',
                [
                    'x-amz-request-algorithm' => 'SHA256',
                    'x-amz-checksum-emoji' => 'user-value',
                ],
                'Hello world'
            )
        );

        $this->assertSame(
            'user-value',
            $updated->getHeaderLine('x-amz-checksum-emoji')
        );
        $this->assertFalse(
            $updated->hasHeader('x-amz-request-algorithm')
        );
        $this->assertFalse($updated->hasHeader('x-amz-checksum-sha256'));
    }

    public function testChecksumControlHeadersDoNotSuppressCalculation(): void
    {
        $updated = $this->interceptModeled(
            RequestChecksumCalculation::WHEN_REQUIRED,
            'RequiredChecksum',
            null,
            new Request(
                'POST',
                'https://example.test',
                ['x-amz-checksum-mode' => 'ENABLED'],
                'Hello world'
            )
        );

        $this->assertSame(
            'i9aeUg==',
            $updated->getHeaderLine('x-amz-checksum-crc32')
        );
    }

    public function testRejectsUnsupportedCalculatedAlgorithm(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            "Unsupported flexible checksum algorithm 'MD5'. Supported "
            . 'algorithms are: CRC32, CRC32C, SHA1, SHA256, SHA512, '
            . 'XXHASH64, XXHASH3, XXHASH128.'
        );

        $this->interceptModeled(
            RequestChecksumCalculation::WHEN_REQUIRED,
            'RequiredChecksum',
            'MD5',
            new Request(
                'POST',
                'https://example.test',
                ['x-amz-request-algorithm' => 'MD5'],
                'Hello world'
            )
        );
    }

    public function testRejectsCrc64NvmeCalculatedAlgorithm(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            "Unsupported flexible checksum algorithm 'CRC64NVME'. Supported "
            . 'algorithms are: CRC32, CRC32C, SHA1, SHA256, SHA512, '
            . 'XXHASH64, XXHASH3, XXHASH128.'
        );

        $this->interceptModeled(
            RequestChecksumCalculation::WHEN_REQUIRED,
            'RequiredChecksum',
            'CRC64NVME',
            new Request(
                'POST',
                'https://example.test',
                ['x-amz-request-algorithm' => 'CRC64NVME'],
                'Hello world'
            )
        );
    }

    public function testCalculatesChecksumAfterRequestCompression(): void
    {
        $config = (new RequestCompressionPlugin(
            minCompressionSizeBytes: 0
        ))->configure($this->client->getConfig());
        $config = (new FlexibleChecksumPlugin())->configure($config);
        $operation = $this->client->operation('RequiredChecksum');
        $updated = HttpTransportRequest::expect(
            $config->interceptorChain->modifyBeforeRetryLoop(
                new RequestContext(
                    $operation,
                    $operation->createInputFromValue([]),
                    $config,
                    new HttpTransportRequest(new Request(
                        'POST',
                        'https://example.test',
                        [],
                        'Hello world'
                    ))
                )
            )
        )->request;

        $this->assertSame('gzip', $updated->getHeaderLine('Content-Encoding'));
        $this->assertSame(
            \base64_encode(\hash(
                'crc32b',
                (string) $updated->getBody(),
                true
            )),
            $updated->getHeaderLine('x-amz-checksum-crc32')
        );
        $this->assertNotSame(
            'i9aeUg==',
            $updated->getHeaderLine('x-amz-checksum-crc32')
        );
        $this->assertTrue(
            $config->interceptorChain->contains(
                RequestCompressionInterceptor::class
            )
        );
        $this->assertTrue(
            $config->interceptorChain->contains(
                FlexibleChecksumRequestInterceptor::class
            )
        );
        $this->assertTrue(
            $config->interceptorChain->contains(
                FlexibleChecksumResponseInterceptor::class
            )
        );
    }

    public function testCalculatesStreamingChecksumInHeaderAndPreservesPosition(): void
    {
        $resource = \fopen('php://temp', 'r+');
        $this->assertIsResource($resource);
        \fwrite($resource, 'skip-Hello world');
        \fseek($resource, 5);
        $body = new ResourceRequestStream($resource);

        $updated = $this->interceptModeled(
            RequestChecksumCalculation::WHEN_REQUIRED,
            'StreamingChecksum',
            null,
            new Request('POST', 'https://example.test', [], $body)
        );

        $this->assertSame(
            \base64_encode(\hash('crc32b', 'Hello world', true)),
            $updated->getHeaderLine('x-amz-checksum-crc32')
        );
        $this->assertFalse($updated->hasHeader('x-amz-trailer'));
        $this->assertSame(5, $updated->getBody()->tell());
    }

    public function testSendsNonSeekableStreamingBodyWithUnsignedTrailer(): void
    {
        $updated = $this->interceptModeled(
            RequestChecksumCalculation::WHEN_REQUIRED,
            'StreamingChecksum',
            null,
            new Request(
                'POST',
                'https://example.test',
                [],
                $this->nonSeekableBody('Hello world')
            )
        );

        $this->assertSame(
            'aws-chunked',
            $updated->getHeaderLine('content-encoding')
        );
        $this->assertSame(
            'x-amz-checksum-crc32',
            $updated->getHeaderLine('x-amz-trailer')
        );
        $this->assertSame(
            'STREAMING-UNSIGNED-PAYLOAD-TRAILER',
            $updated->getHeaderLine('x-amz-content-sha256')
        );
        $this->assertSame(
            'chunked',
            $updated->getHeaderLine('transfer-encoding')
        );
        $this->assertFalse($updated->hasHeader('x-amz-checksum-crc32'));
        $this->assertSame(
            "b\r\nHello world\r\n0\r\nx-amz-checksum-crc32:i9aeUg==\r\n\r\n",
            $updated->getBody()->getContents()
        );
    }

    public function testRejectsNonSeekableStreamingBodyOverPlainHttp(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('HTTPS');

        $this->interceptModeled(
            RequestChecksumCalculation::WHEN_REQUIRED,
            'StreamingChecksum',
            null,
            new Request(
                'POST',
                'http://example.test',
                [],
                $this->nonSeekableBody('Hello world')
            )
        );
    }

    public function testWhenRequiredSkipsOptionalStreamingTrailer(): void
    {
        $request = new Request(
            'POST',
            'https://example.test',
            [],
            $this->nonSeekableBody('Hello world')
        );

        $updated = $this->interceptModeled(
            RequestChecksumCalculation::WHEN_REQUIRED,
            'OptionalStreamingChecksum',
            null,
            $request
        );

        $this->assertSame($request, $updated);
    }

    /**
     * @param array<string, mixed> $case
     */
    #[DataProvider('requestCalculationCases')]
    public function testRequestChecksumCalculationCases(array $case): void
    {
        $this->assertCaseHeaders(
            $case,
            fn (RequestInterface $request) => $this->interceptCase(
                $case,
                'RequiredChecksum',
                $request
            )
        );
    }

    /**
     * @param array<string, mixed> $case
     */
    #[DataProvider('streamingRequestCases')]
    public function testStreamingRequestChecksumCases(array $case): void
    {
        $this->assertCaseHeaders(
            $case,
            fn (RequestInterface $request) => $this->interceptCase(
                $case,
                'StreamingChecksum',
                $request
            ),
            streaming: true
        );
    }

    /**
     * @param array<string, mixed> $case
     */
    #[DataProvider('userProvidedChecksumCases')]
    public function testUserProvidedChecksumCases(array $case): void
    {
        $algorithm = \strtoupper((string) $case['checksumAlgorithm']);
        $request = new Request(
            'POST',
            'https://example.test',
            [
                'x-amz-request-algorithm' => $algorithm,
                'x-amz-checksum-' . \strtolower($algorithm)
                    => $case['checksumValue'],
            ],
            $case['requestPayload']
        );

        $updated = $this->interceptModeled(
            RequestChecksumCalculation::WHEN_SUPPORTED,
            'RequiredChecksum',
            $algorithm,
            $request
        );

        foreach ($case['expectHeaders'] as $name => $value) {
            $this->assertSame($value, $updated->getHeaderLine($name));
        }
        foreach ($case['forbidHeaders'] as $name) {
            $this->assertFalse($updated->hasHeader($name));
        }
    }

    /**
     * @return iterable<string, array{array<string, mixed>}>
     */
    public static function requestCalculationCases(): iterable
    {
        return self::fixtureCases('test-request-checksum-calculation.json');
    }

    /**
     * @return iterable<string, array{array<string, mixed>}>
     */
    public static function streamingRequestCases(): iterable
    {
        return self::fixtureCases(
            'test-streaming-request-checksum-calculation.json'
        );
    }

    /**
     * @return iterable<string, array{array<string, mixed>}>
     */
    public static function userProvidedChecksumCases(): iterable
    {
        return self::fixtureCases('test-user-provided-checksum.json');
    }

    /**
     * @return iterable<string, array{array<string, mixed>}>
     */
    private static function fixtureCases(string $file): iterable
    {
        $cases = \json_decode(
            (string) \file_get_contents(__DIR__ . '/fixtures/' . $file),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
        foreach ($cases as $index => $case) {
            yield $index . ': ' . $case['documentation'] => [$case];
        }
    }

    /**
     * Assert a specification case: calculated headers, trailers, or the expected error.
     *
     * CRC64NVME is a preview exclusion, so the runtime rejects it with the
     * same unsupported-algorithm error the specification expects for MD5.
     *
     * @param array<string, mixed> $case
     * @param callable(RequestInterface): RequestInterface $run
     */
    private function assertCaseHeaders(
        array $case,
        callable $run,
        bool $streaming = false
    ): void
    {
        $algorithm = \strtoupper((string) ($case['checksumAlgorithm'] ?? ''));
        $body = $streaming
            ? $this->nonSeekableBody($case['requestPayload'])
            : $case['requestPayload'];
        $request = new Request(
            'POST',
            'https://example.test',
            $algorithm === '' ? [] : ['x-amz-request-algorithm' => $algorithm],
            $body
        );

        if (isset($case['expectError'])
            || $algorithm === 'CRC64NVME'
        ) {
            $this->expectException(\InvalidArgumentException::class);
            $run($request);

            return;
        }

        $updated = $run($request);
        foreach ($case['expectHeaders'] as $name => $value) {
            $this->assertSame($value, $updated->getHeaderLine($name), $name);
        }
        if (!$streaming) {
            return;
        }

        $this->assertSame(
            'STREAMING-UNSIGNED-PAYLOAD-TRAILER',
            $updated->getHeaderLine('x-amz-content-sha256')
        );
        $this->assertSame(
            'chunked',
            $updated->getHeaderLine('transfer-encoding')
        );
        $encoded = $updated->getBody()->getContents();
        foreach ($case['expectTrailers'] as $name => $value) {
            $this->assertStringEndsWith(
                "\r\n0\r\n{$name}:{$value}\r\n\r\n",
                $encoded
            );
        }
    }

    /**
     * @param array<string, mixed> $case
     */
    private function interceptCase(
        array $case,
        string $operationName,
        RequestInterface $request
    ): RequestInterface
    {
        $algorithm = isset($case['checksumAlgorithm'])
            ? \strtoupper((string) $case['checksumAlgorithm'])
            : null;

        return $this->interceptModeled(
            RequestChecksumCalculation::WHEN_SUPPORTED,
            $operationName,
            $algorithm,
            $request
        );
    }

    private function nonSeekableBody(string $payload): NonSeekablePayloadStream
    {
        return new NonSeekablePayloadStream($payload);
    }

    private function interceptModeled(
        RequestChecksumCalculation $mode,
        string $operationName,
        ?string $algorithm,
        RequestInterface $request
    ): RequestInterface
    {
        $operation = $this->client->operation($operationName);

        return $this->intercept(
            $mode,
            $operation,
            $operation->createInputFromValue(
                $algorithm === null ? [] : ['ChecksumAlgorithm' => $algorithm]
            ),
            $request
        );
    }

    private function intercept(
        RequestChecksumCalculation $mode,
        OperationInterface $operation,
        SerializableStructInterface $input,
        RequestInterface $request
    ): RequestInterface
    {
        $updated = (new FlexibleChecksumRequestInterceptor($mode))
            ->modifyBeforeRetryLoop(new RequestContext(
                $operation,
                $input,
                $this->client->getConfig(),
                new HttpTransportRequest($request)
            ));

        return HttpTransportRequest::expect($updated)->request;
    }
}
