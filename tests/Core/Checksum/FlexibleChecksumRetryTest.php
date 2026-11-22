<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Checksum;

use Aws\Core\Checksum\FlexibleChecksumRequestInterceptor;
use Aws\Core\Checksum\RequestChecksumCalculation;
use PHPUnit\Framework\TestCase;
use Smithy\Client\AbstractClient;
use Smithy\Client\ClientConfig;
use Smithy\Client\Endpoint\StaticEndpointResolver;
use Smithy\Client\Interceptor\InterceptorChain;
use Smithy\Client\Retry\RetryState;
use Smithy\Client\Retry\RetryStrategyInterface;
use Smithy\Client\Retry\TokenAcquisitionFailedException;
use Smithy\Core\Endpoint\Endpoint;
use Smithy\Core\Exception\ApiException;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ServiceInterface;
use Smithy\Core\Shape\ShapeType;
use Smithy\Core\Transport\{
    MessageExchangeInterface,
    TransportRequestInterface,
    TransportResponseInterface
};
use Smithy\Http\Client\HttpClientTransport;
use Smithy\Http\Message\{
    HttpMessageExchange,
    HttpTransportRequest,
    HttpTransportResponse,
    Request,
    RequestStreamInterface,
    Response,
    Uri
};
use Smithy\Protocol\ProtocolInterface;
use Smithy\Tests\Utils\Http\MockHttpClient;

final class FlexibleChecksumRetryTest extends TestCase
{
    public function testChecksumIsNotRecalculatedOnRetry(): void
    {
        $body = new MutableChecksumBody('first payload');
        $expected = \base64_encode(\hash(
            'crc32b',
            'first payload',
            true
        ));
        $http = (new MockHttpClient())
            ->queueHandler(function () use ($body): Response {
                $body->content = 'changed payload';

                return new Response(500);
            })
            ->queueResponse(new Response(200));
        $config = new ClientConfig(
            protocol: new RetryChecksumProtocol($body),
            transport: new HttpClientTransport($http),
            endpointResolver: new StaticEndpointResolver(
                new Endpoint('https://example.test')
            ),
            interceptors: new InterceptorChain(
                new FlexibleChecksumRequestInterceptor(
                    RequestChecksumCalculation::WHEN_REQUIRED
                )
            ),
            retryStrategy: new RetryOnceStrategy(),
            service: RetryFlexibleChecksumService::instance()
        );
        $client = new class($config) extends AbstractClient {};

        $client->executeOperation(
            RetryFlexibleChecksumOperation::instance(),
            new RetryFlexibleChecksumInput()
        );

        $this->assertSame(2, $http->sendCallCount);
        $this->assertSame(
            $expected,
            $http->sentRequests[0]->getHeaderLine(
                'x-amz-checksum-crc32'
            )
        );
        $this->assertSame(
            $expected,
            $http->sentRequests[1]->getHeaderLine(
                'x-amz-checksum-crc32'
            )
        );
    }
}

final class RetryFlexibleChecksumService implements ServiceInterface
{
    private static ?self $instance = null;
    private static ?Schema $schema = null;

    public static function instance(): self
    {
        return self::$instance ??= new self();
    }

    public function getName(): string
    {
        return 'RetryFlexibleChecksumService';
    }

    public function getId(): string
    {
        return 'aws.tests#RetryFlexibleChecksumService';
    }

    public function getVersion(): string
    {
        return '1';
    }

    public function getSchema(): Schema
    {
        return self::$schema ??= new Schema(
            id: $this->getId(),
            type: ShapeType::Service,
            traitsById: ['aws.tests#retryChecksum' => true]
        );
    }

    public function getOperations(): array
    {
        return [RetryFlexibleChecksumOperation::instance()];
    }

    public function getOperation(string $name): ?OperationInterface
    {
        return $name === RetryFlexibleChecksumOperation::instance()->getName()
            ? RetryFlexibleChecksumOperation::instance()
            : null;
    }
}

final class RetryChecksumProtocol implements ProtocolInterface
{
    public function getId(): string
    {
        return 'aws.tests#retryChecksum';
    }

    public function getMessageExchange(): MessageExchangeInterface
    {
        return HttpMessageExchange::instance();
    }

    public function __construct(
        private readonly MutableChecksumBody $body
    ) {}

    public function serializeRequest(
        OperationInterface $operation,
        SerializableStructInterface $input
    ): TransportRequestInterface
    {
        return new HttpTransportRequest(
            new Request('POST', new Uri('/'), [], $this->body)
        );
    }

    public function setServiceEndpoint(
        TransportRequestInterface $request,
        Endpoint $endpoint
    ): TransportRequestInterface
    {
        $request = HttpTransportRequest::expect($request);

        return $request->withRequest(
            $request->request->withUri(new Uri($endpoint->url))
        );
    }

    public function deserializeResponse(
        OperationInterface $operation,
        TransportResponseInterface $response
    ): SerializableStructInterface
    {
        $response = HttpTransportResponse::expect($response)->response;
        if ($response->getStatusCode() >= 500) {
            throw new \RuntimeException('retry');
        }

        return new RetryFlexibleChecksumInput();
    }
}

final class RetryFlexibleChecksumInput implements SerializableStructInterface
{
    use \Smithy\Core\Shape\WithMemberValueTrait;
    private static ?Schema $schema = null;

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function schema(): Schema
    {
        return self::$schema ??= new Schema(
            id: 'aws.tests#RetryFlexibleChecksumInput',
            type: ShapeType::Structure,
            members: [
                new Schema(
                    id: 'aws.tests#StreamingBlob',
                    type: ShapeType::Blob,
                    memberName: 'body',
                    memberIndex: 0,
                    traits: [Schema::T_STREAMING => true]
                )
            ]
        );
    }

    public function serialize(
        ShapeSerializerInterface $serializer,
        int $idx
    ): void
    {
    }

    public function serializeMembers(
        ShapeSerializerInterface $serializer
    ): void
    {
    }

    public function getMemberValue(Schema $member): mixed
    {
        return null;
    }
}

final class RetryFlexibleChecksumOperation implements OperationInterface
{
    private static ?self $instance = null;
    private static ?Schema $schema = null;

    public static function instance(): self
    {
        return self::$instance ??= new self();
    }

    public function getName(): string
    {
        return 'RetryFlexibleChecksum';
    }

    public function getId(): string
    {
        return 'aws.tests#RetryFlexibleChecksum';
    }

    public function getServiceId(): ?string
    {
        return null;
    }

    public function getServiceExceptionClass(): string
    {
        return ApiException::class;
    }

    public function getRuntimeIdentity(): string
    {
        return self::class;
    }

    public function getEffectiveAuthSchemes(): array
    {
        return ['smithy.api#noAuth'];
    }

    public function getInputClass(): string
    {
        return RetryFlexibleChecksumInput::class;
    }

    public function getOutputClass(): string
    {
        return RetryFlexibleChecksumInput::class;
    }

    public function getErrors(): array
    {
        return [];
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function schema(): Schema
    {
        return self::$schema ??= new Schema(
            id: 'aws.tests#RetryFlexibleChecksum',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP_CHECKSUM => [
                    'requestChecksumRequired' => true,
                    'requestAlgorithmMemberIndex' => null,
                    'requestAlgorithmHeader' =>
                        'x-amz-request-algorithm',
                    'requestValidationModeMemberIndex' => null,
                    'requestValidationModeHeader' => null,
                    'responseAlgorithms' => [],
                ]
            ]
        );
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function inputSchema(): Schema
    {
        return RetryFlexibleChecksumInput::schema();
    }

    public function getOutputSchema(): Schema
    {
        return self::outputSchema();
    }

    public static function outputSchema(): Schema
    {
        return RetryFlexibleChecksumInput::schema();
    }

    public function getErrorSchemas(): array
    {
        return [];
    }

    public function createInput(array $members): \Smithy\Core\Serde\SerializableStructInterface
    {
        $inputClass = $this->getInputClass();

        return $inputClass === ""
            ? \Smithy\Core\Shape\Document\StructDocument::fromMembers(
                $this->getInputSchema(),
                $members
            )
            : new $inputClass(...$members);
    }

    public function createOutput(array $members): \Smithy\Core\Serde\SerializableStructInterface
    {
        $outputClass = $this->getOutputClass();

        return $outputClass === ""
            ? \Smithy\Core\Shape\Document\StructDocument::fromMembers(
                $this->getOutputSchema(),
                $members
            )
            : new $outputClass(...$members);
    }

    public function getRequestTarget(): ?string
    {
        return \defined(static::class . "::TARGET")
            ? \constant(static::class . "::TARGET")
            : $this->getName();
    }

    public function resolveErrorSchema(string $discriminator): ?Schema
    {
        $errorMap = $this->getSchema()->getTrait(Schema::T_ERRORS) ?? [];
        $errorClass = $errorMap[$discriminator] ?? null;

        return \is_string($errorClass)
            && \method_exists($errorClass, "schema")
                ? $errorClass::schema()
                : null;
    }

    public function getInputStreamMember(): ?Schema
    {
        return self::inputSchema()->getMemberByIndex(0);
    }

    public function getOutputStreamMember(): ?Schema
    {
        return null;
    }
}

final class RetryOnceStrategy implements RetryStrategyInterface
{
    private int $refreshCount = 0;

    public function begin(string $scope, int $requestFlags = 0): RetryState
    {
        return new RetryState($scope, $requestFlags);
    }

    public function refresh(RetryState $state, \Throwable $error): float
    {
        if ($this->refreshCount++ === 0) {
            return 0.0;
        }

        throw new TokenAcquisitionFailedException(
            'Retries exhausted.',
            previous: $error,
            state: $state
        );
    }

    public function recordSuccess(RetryState $state): void {}

    public function maxAttempts(): int
    {
        return 2;
    }
}

final class MutableChecksumBody implements RequestStreamInterface
{
    public int $hashCount = 0;
    private int $position = 0;

    public function __construct(public string $content) {}

    public function __toString(): string
    {
        return $this->content;
    }

    public function close(): void {}

    public function detach()
    {
        return null;
    }

    public function getSize(): ?int
    {
        return \strlen($this->content);
    }

    public function length(): ?int
    {
        return $this->getSize();
    }

    public function tell(): int
    {
        return $this->position;
    }

    public function eof(): bool
    {
        return $this->position >= \strlen($this->content);
    }

    public function isSeekable(): bool
    {
        return true;
    }

    public function seek(int $offset, int $whence = SEEK_SET): void
    {
        $this->position = match ($whence) {
            SEEK_SET => $offset,
            SEEK_CUR => $this->position + $offset,
            SEEK_END => \strlen($this->content) + $offset,
            default => throw new \InvalidArgumentException(
                'Invalid seek mode.'
            ),
        };
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function rewindForRetry(): void
    {
        $this->rewind();
    }

    public function isWritable(): bool
    {
        return false;
    }

    public function write(string $string): int
    {
        throw new \RuntimeException('Stream is not writable.');
    }

    public function isReadable(): bool
    {
        return true;
    }

    public function read(int $length): string
    {
        $chunk = \substr($this->content, $this->position, $length);
        $this->position += \strlen($chunk);

        return $chunk;
    }

    public function getContents(): string
    {
        return $this->read(\strlen($this->content) - $this->position);
    }

    public function getMetadata(?string $key = null)
    {
        return $key === null ? [] : null;
    }

    public function hash(string $algo = 'sha256', bool $raw = false): string
    {
        ++$this->hashCount;

        return \hash($algo, $this->content, $raw);
    }

    public function isReplayable(): bool
    {
        return true;
    }

    public function isAvailable(): bool
    {
        return true;
    }

    public function started(): bool
    {
        return $this->position > 0;
    }

    public function fullyConsumed(): bool
    {
        return $this->eof();
    }
}
