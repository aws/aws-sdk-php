<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Checksum;

use Aws\Core\Checksum\FlexibleChecksumPlugin;
use Aws\Core\Checksum\FlexibleChecksumResponseInterceptor;
use Aws\Core\Checksum\ResponseChecksumValidation;
use Aws\Tests\Core\Checksum\Utils\ChecksumTestClient;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Smithy\Client\Interceptor\RequestContext;
use Smithy\Client\Interceptor\ResponseContext;
use Smithy\Client\Plugin\PluginCollection;
use Smithy\Core\Checksum\ChecksumAlgorithm;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Http\Checksum\ChecksumMismatchException;
use Smithy\Http\Checksum\ChecksumStream;
use Smithy\Http\Checksum\ExpectedChecksum;
use Smithy\Http\Message\HttpTransportRequest;
use Smithy\Http\Message\HttpTransportResponse;
use Smithy\Http\Message\Request;
use Smithy\Http\Message\Response;
use Smithy\Tests\Utils\Http\GenericPsrRequest;

final class FlexibleChecksumResponseInterceptorTest extends TestCase
{
    private ChecksumTestClient $client;

    protected function setUp(): void
    {
        $this->client = ChecksumTestClient::forModel();
    }

    public function testWhenSupportedEnablesModeledResponseValidation(): void
    {
        $updated = $this->interceptRequest(
            ResponseChecksumValidation::WHEN_SUPPORTED
        );

        $this->assertSame(
            'ENABLED',
            $updated->getHeaderLine('x-amz-checksum-mode')
        );
    }

    public function testEnablesValidationForGenericPsrRequest(): void
    {
        $updated = $this->interceptRequest(
            ResponseChecksumValidation::WHEN_SUPPORTED,
            request: new GenericPsrRequest(new Request(
                'GET',
                'https://example.test',
            ))
        );

        $this->assertInstanceOf(GenericPsrRequest::class, $updated);
        $this->assertSame(
            'ENABLED',
            $updated->getHeaderLine('x-amz-checksum-mode'),
        );
    }

    public function testWhenRequiredDoesNotEnableValidationByDefault(): void
    {
        $request = $this->interceptRequest(
            ResponseChecksumValidation::WHEN_REQUIRED
        );

        $this->assertFalse($request->hasHeader('x-amz-checksum-mode'));
    }

    public function testWhenRequiredHonorsUserEnabledValidation(): void
    {
        $updated = $this->interceptRequest(
            ResponseChecksumValidation::WHEN_REQUIRED,
            'ENABLED'
        );

        $this->assertSame(
            'ENABLED',
            $updated->getHeaderLine('x-amz-checksum-mode')
        );
    }

    public function testPluginUsesConfiguredResponseValidationMode(): void
    {
        $client = ChecksumTestClient::forModel(
            new PluginCollection(new FlexibleChecksumPlugin()),
            ResponseChecksumValidation::WHEN_REQUIRED
        );
        $configured = $client->getConfig();

        $this->assertTrue(
            $configured->interceptorChain->contains(
                FlexibleChecksumResponseInterceptor::class
            )
        );

        $operation = $client->operation('ResponseChecksum');
        $request = new Request('GET', 'https://example.test');
        $updated = HttpTransportRequest::expect(
            $configured->interceptorChain->modifyBeforeRetryLoop(
                new RequestContext(
                    $operation,
                    $operation->createInputFromValue([]),
                    $configured,
                    new HttpTransportRequest($request)
                )
            )
        )->request;

        $this->assertSame($request, $updated);
    }

    public function testSelectsFastestSupportedModeledChecksum(): void
    {
        $selection = $this->select(
            ResponseChecksumValidation::WHEN_SUPPORTED,
            new Response(200, [
                'x-amz-checksum-crc32' => 'i9aeUg==',
                'x-amz-checksum-crc32c' => 'crUfeA==',
                'x-amz-checksum-sha256' =>
                    'ZOyIygCyaOW6GjVnihtTFtIS9PNmskdyMlNKiuyjfzw=',
            ])
        );

        $this->assertInstanceOf(ExpectedChecksum::class, $selection);
        $this->assertSame(ChecksumAlgorithm::CRC32C, $selection->algorithm);
        $this->assertSame('crUfeA==', $selection->base64Digest);
    }

    public function testMalformedPreferredHeaderFallsBackToNextAlgorithm(): void
    {
        $selection = $this->select(
            ResponseChecksumValidation::WHEN_SUPPORTED,
            new Response(200, [
                'x-amz-checksum-crc32c' => 'not-base64!',
                'x-amz-checksum-crc32' => 'i9aeUg==',
            ])
        );

        $this->assertInstanceOf(ExpectedChecksum::class, $selection);
        $this->assertSame(ChecksumAlgorithm::CRC32, $selection->algorithm);
    }

    public function testSkipsUnsupportedAndMd5Checksums(): void
    {
        $selection = $this->select(
            ResponseChecksumValidation::WHEN_SUPPORTED,
            new Response(200, [
                'x-amz-checksum-crc64nvme' => 'OOJZ0D8xKts=',
                'x-amz-checksum-md5' => 'PiWWCnnbxptnTNTsZ6csYg==',
            ])
        );

        $this->assertNull($selection);
    }

    public function testSkipsValidationWhenOnlyUnsupportedChecksumPresent(): void
    {
        $selection = $this->select(
            ResponseChecksumValidation::WHEN_SUPPORTED,
            new Response(200, [
                'x-amz-checksum-crc64nvme' => 'OOJZ0D8xKts=',
            ])
        );

        $this->assertNull($selection);
    }

    public function testPrefersSupportedChecksumOverUnsupportedOne(): void
    {
        $selection = $this->select(
            ResponseChecksumValidation::WHEN_SUPPORTED,
            new Response(200, [
                'x-amz-checksum-crc64nvme' => 'OOJZ0D8xKts=',
                'x-amz-checksum-crc32' => 'i9aeUg==',
            ])
        );

        $this->assertInstanceOf(ExpectedChecksum::class, $selection);
        $this->assertSame(ChecksumAlgorithm::CRC32, $selection->algorithm);
    }

    public function testWhenRequiredSkipsSelectionWithoutUserOptIn(): void
    {
        $selection = $this->select(
            ResponseChecksumValidation::WHEN_REQUIRED,
            new Response(
                200,
                ['x-amz-checksum-crc32' => 'i9aeUg==']
            )
        );

        $this->assertNull($selection);
    }

    public function testDoesNotSelectChecksumFromErrorResponse(): void
    {
        $selection = $this->select(
            ResponseChecksumValidation::WHEN_SUPPORTED,
            new Response(
                500,
                ['x-amz-checksum-crc32' => 'i9aeUg==']
            )
        );

        $this->assertNull($selection);
    }

    public function testSkipsS3CompositeChecksum(): void
    {
        $operation = $this->client->operation('ResponseChecksum');
        $input = $operation->createInputFromValue([]);
        $interceptor = new FlexibleChecksumResponseInterceptor(
            ResponseChecksumValidation::WHEN_SUPPORTED
        );
        $request = $interceptor->modifyBeforeRetryLoop(new RequestContext(
            $operation,
            $input,
            $this->client->getConfig(),
            new HttpTransportRequest(
                new Request('GET', 'https://example.test')
            )
        ));
        $response = new Response(
            200,
            ['x-amz-checksum-crc32' => 'i9aeUg==-10000'],
            'Hello world'
        );
        $context = new ResponseContext(
            $operation,
            $input,
            $this->client->getConfig(),
            $request,
            new HttpTransportResponse($response)
        );

        $this->assertNull(
            $interceptor->selectResponseChecksum($context)
        );
        $this->assertSame(
            $response,
            HttpTransportResponse::expect(
                $interceptor->modifyBeforeDeserialization($context)
            )->response
        );
    }

    public function testCompositeChecksumFallsBackToFullObjectChecksum(): void
    {
        $operation = $this->client->operation('ResponseChecksum');
        $selection = $this->selectFor(
            $operation,
            $operation->createInputFromValue([]),
            ResponseChecksumValidation::WHEN_SUPPORTED,
            new Response(200, [
                'x-amz-checksum-crc32c' => 'crUfeA==-1',
                'x-amz-checksum-crc32' => 'i9aeUg==',
            ])
        );

        $this->assertInstanceOf(ExpectedChecksum::class, $selection);
        $this->assertSame(ChecksumAlgorithm::CRC32, $selection->algorithm);
        $this->assertSame('i9aeUg==', $selection->base64Digest);
    }

    public function testWrapsSelectedResponseBodyForValidation(): void
    {
        $body = $this->deserializedBody(
            $this->client->operation('ResponseChecksum'),
            null,
            new Response(
                200,
                ['x-amz-checksum-crc32' => 'i9aeUg=='],
                'Hello world'
            )
        );

        $this->assertInstanceOf(
            ChecksumStream::class,
            $body
        );
        $this->assertSame('Hello world', (string) $body);
        $this->assertTrue($body->isValidated());
    }

    /**
     * @param array<string, mixed> $case
     */
    #[DataProvider('responseValidationCases')]
    public function testResponseValidationCases(array $case): void
    {
        $this->assertValidationCase(
            $case,
            $this->client->operation('ResponseChecksum'),
            null
        );
    }

    /**
     * @param array<string, mixed> $case
     */
    #[DataProvider('s3CompositeValidationCases')]
    public function testS3CompositeValidationCases(array $case): void
    {
        $this->assertValidationCase(
            $case,
            $this->client->operation('ResponseChecksum'),
            null
        );
    }

    /**
     * @return iterable<string, array{array<string, mixed>}>
     */
    public static function responseValidationCases(): iterable
    {
        return self::fixtureCases('test-response-checksum-validation.json');
    }

    /**
     * @return iterable<string, array{array<string, mixed>}>
     */
    public static function s3CompositeValidationCases(): iterable
    {
        return self::fixtureCases(
            'test-s3-customization-response-checksum-validation.json'
        );
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
     * Assert a specification case. The runtime validates the algorithms it
     * computes. It leaves the body unwrapped for MD5, CRC64NVME and S3
     * composite checksums.
     *
     * @param array<string, mixed> $case
     */
    private function assertValidationCase(
        array $case,
        OperationInterface $operation,
        ?SerializableStructInterface $input
    ): void
    {
        $algorithm = ChecksumAlgorithm::tryFromName(
            (string) $case['checksumAlgorithm']
        );
        $composite = \str_contains(
            (string) \reset($case['responseHeaders']),
            '-'
        );
        $body = $this->deserializedBody(
            $operation,
            $input,
            new Response(
                200,
                $case['responseHeaders'],
                $case['responsePayload']
            )
        );

        if ($algorithm === null || $composite) {
            $this->assertNotInstanceOf(ChecksumStream::class, $body);
            $this->assertSame($case['responsePayload'], (string) $body);

            return;
        }

        $this->assertInstanceOf(ChecksumStream::class, $body);
        if ($case['expect']['kind'] === 'failure') {
            try {
                $body->getContents();
                $this->fail('Expected a checksum mismatch.');
            } catch (ChecksumMismatchException $e) {
                $this->assertSame(
                    \reset($case['responseHeaders']),
                    $e->expectedChecksum
                );
                $this->assertSame(
                    $case['expect']['calculatedChecksum'],
                    $e->calculatedChecksum
                );
            }

            return;
        }

        $this->assertSame($case['responsePayload'], $body->getContents());
        $this->assertTrue($body->isValidated());
    }

    /**
     * Run a response through the interceptor in WHEN_SUPPORTED mode.
     */
    private function deserializedBody(
        OperationInterface $operation,
        ?SerializableStructInterface $input,
        Response $response
    ): \Psr\Http\Message\StreamInterface
    {
        $input ??= $this->client->operation('ResponseChecksum')
            ->createInputFromValue([]);
        $interceptor = new FlexibleChecksumResponseInterceptor(
            ResponseChecksumValidation::WHEN_SUPPORTED
        );
        $request = $interceptor->modifyBeforeRetryLoop(new RequestContext(
            $operation,
            $input,
            $this->client->getConfig(),
            new HttpTransportRequest(
                new Request('GET', 'https://example.test')
            )
        ));

        return HttpTransportResponse::expect(
            $interceptor->modifyBeforeDeserialization(new ResponseContext(
                $operation,
                $input,
                $this->client->getConfig(),
                $request,
                new HttpTransportResponse($response)
            ))
        )->response->getBody();
    }

    private function interceptRequest(
        ResponseChecksumValidation $mode,
        ?string $checksumMode = null,
        RequestInterface $request = new Request('GET', 'https://example.test')
    ): RequestInterface
    {
        $operation = $this->client->operation('ResponseChecksum');

        return HttpTransportRequest::expect(
            (new FlexibleChecksumResponseInterceptor($mode))
                ->modifyBeforeRetryLoop(new RequestContext(
                    $operation,
                    $operation->createInputFromValue(
                        $checksumMode === null
                            ? []
                            : ['ChecksumMode' => $checksumMode]
                    ),
                    $this->client->getConfig(),
                    new HttpTransportRequest($request)
                ))
        )->request;
    }

    private function select(
        ResponseChecksumValidation $mode,
        Response $response
    ): ?ExpectedChecksum
    {
        $operation = $this->client->operation('ResponseChecksum');

        return $this->selectFor(
            $operation,
            $operation->createInputFromValue([]),
            $mode,
            $response
        );
    }

    private function selectFor(
        OperationInterface $operation,
        SerializableStructInterface $input,
        ResponseChecksumValidation $mode,
        Response $response
    ): ?ExpectedChecksum
    {
        $interceptor = new FlexibleChecksumResponseInterceptor($mode);
        $request = $interceptor->modifyBeforeRetryLoop(new RequestContext(
            $operation,
            $input,
            $this->client->getConfig(),
            new HttpTransportRequest(
                new Request('GET', 'https://example.test')
            )
        ));

        return $interceptor->selectResponseChecksum(new ResponseContext(
            $operation,
            $input,
            $this->client->getConfig(),
            $request,
            new HttpTransportResponse($response)
        ));
    }
}
