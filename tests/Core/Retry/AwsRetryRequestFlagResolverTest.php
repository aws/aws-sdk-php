<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Retry;

use Aws\Core\Client\AbstractAwsClientConfig;
use Aws\Core\Retry\AwsRetryRequestFlagResolver;
use PHPUnit\Framework\TestCase;
use Smithy\Auth\AnonymousIdentityResolver;
use Smithy\Core\Endpoint\Endpoint;
use Smithy\Client\Endpoint\StaticEndpointResolver;
use Smithy\Client\Plugin\PluginState;
use Smithy\Client\Retry\RetryRequestFlags;
use Smithy\Core\Transport\{
    MessageExchangeInterface,
    TransportRequestInterface,
    TransportResponseInterface
};
use Smithy\Core\Exception\ApiException;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Shape\ShapeType;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Http\Client\HttpClientInterface;
use Smithy\Http\Client\Connection\ConnectionManagerInterface;
use Smithy\Http\Client\HttpRequestOptions;
use Smithy\Http\Message\HttpMessageExchange;
use Smithy\Http\Message\Response;
use Smithy\Protocol\ProtocolInterface;

final class AwsRetryRequestFlagResolverTest extends TestCase
{
    public function testResolvesLongPollingAllowlist(): void
    {
        $resolver = AwsRetryRequestFlagResolver::instance();

        $this->assertSame(
            RetryRequestFlags::LONG_POLLING,
            $resolver->resolve(
                new ResolverTestOperation('ReceiveMessage'),
                new ResolverTestAwsClientConfig('sqs')
            )
        );
        $this->assertSame(
            RetryRequestFlags::LONG_POLLING,
            $resolver->resolve(
                new ResolverTestOperation('GetActivityTask'),
                new ResolverTestAwsClientConfig('states')
            )
        );
        $this->assertSame(
            RetryRequestFlags::LONG_POLLING,
            $resolver->resolve(
                new ResolverTestOperation('PollForActivityTask'),
                new ResolverTestAwsClientConfig('swf')
            )
        );
        $this->assertSame(
            RetryRequestFlags::LONG_POLLING,
            $resolver->resolve(
                new ResolverTestOperation('PollForDecisionTask'),
                new ResolverTestAwsClientConfig('swf')
            )
        );
    }

    public function testReturnsZeroForNonLongPollingOperation(): void
    {
        $resolver = AwsRetryRequestFlagResolver::instance();

        $this->assertSame(
            0,
            $resolver->resolve(
                new ResolverTestOperation('PutObject'),
                new ResolverTestAwsClientConfig('s3')
            )
        );
    }
}

final class ResolverTestAwsClientConfig extends AbstractAwsClientConfig
{
    public function __construct(
        private readonly string $testSigningName,
        ?PluginState $pluginState = null
    ) {
        parent::__construct(
            region: 'us-east-1',
            credentials: AnonymousIdentityResolver::instance(),
            httpClient: new class implements HttpClientInterface {
                public function getDefaultRequestOptions(): HttpRequestOptions
                {
                    return new HttpRequestOptions();
                }

                public function sendRequest(
                    \Psr\Http\Message\RequestInterface $request,
                    ?HttpRequestOptions $options = null
                ): \Smithy\Http\Message\ResponseInterface {
                    return new Response();
                }

                public function sendMulti(
                    array $requests,
                    ?HttpRequestOptions $options = null
                ): array {
                    return [];
                }

                public function getConnectionManager(): ConnectionManagerInterface
                {
                    throw new \LogicException('Not used in this test.');
                }

                public function close(): void {}
            },
            pluginState: $pluginState
        );
    }

    protected function createProtocol(): ProtocolInterface
    {
        return new class implements ProtocolInterface {
            public function getId(): string
            {
                return 'smithy.tests#resolverTest';
            }

            public function getMessageExchange(): MessageExchangeInterface
            {
                return HttpMessageExchange::instance();
            }

            public function serializeRequest(
                OperationInterface $operation,
                \Smithy\Core\Serde\SerializableStructInterface $input,
            ): TransportRequestInterface {
                throw new \LogicException('Not used in this test.');
            }

            public function setServiceEndpoint(
                TransportRequestInterface $request,
                Endpoint $endpoint,
            ): TransportRequestInterface {
                throw new \LogicException('Not used in this test.');
            }

            public function deserializeResponse(
                OperationInterface $operation,
                TransportResponseInterface $response,
            ): \Smithy\Core\Serde\SerializableStructInterface {
                throw new \LogicException('Not used in this test.');
            }
        };
    }

    protected function getHttpClient(): HttpClientInterface {
        throw new \LogicException('Not used in this test.');
    }

    protected function getEndpointResolver(): StaticEndpointResolver
    {
        return new StaticEndpointResolver(new Endpoint('https://example.test'));
    }

    protected function getSigningName(): string
    {
        return $this->testSigningName;
    }

    protected function copyWith(array $overrides): static
    {
        return new static(
            \array_key_exists('signingName', $overrides)
                ? $overrides['signingName']
                : $this->testSigningName,
            \array_key_exists('pluginState', $overrides)
                ? $overrides['pluginState']
                : $this->getPluginState()
        );
    }
}

final class ResolverTestOperation implements OperationInterface
{
    private static ?Schema $schema = null;

    public function __construct(private readonly string $name) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): string
    {
        return 'smithy.tests#' . $this->name;
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
        return '';
    }

    public function getOutputClass(): string
    {
        return '';
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
            id: 'smithy.tests#ResolverTestOperation',
            type: ShapeType::Operation
        );
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function inputSchema(): Schema
    {
        return new Schema(
            id: 'smithy.tests#ResolverTestInput',
            type: ShapeType::Structure
        );
    }

    public function getOutputSchema(): Schema
    {
        return self::outputSchema();
    }

    public static function outputSchema(): Schema
    {
        return new Schema(
            id: 'smithy.tests#ResolverTestOutput',
            type: ShapeType::Structure
        );
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
        return null;
    }

    public function getOutputStreamMember(): ?Schema
    {
        return null;
    }
}
