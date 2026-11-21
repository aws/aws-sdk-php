<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Retry;

use Aws\Core\Client\AbstractAwsClient;
use Aws\Core\Exception\AwsException;
use Aws\Core\Retry\RetryMetadataException;
use Aws\Core\Retry\StandardRetryInterceptor;
use Aws\Tests\Utils\Http\RetryUploadServerFixture;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Smithy\Auth\AnonymousIdentityResolver;
use Smithy\Core\Endpoint\Endpoint;
use Smithy\Client\Endpoint\StaticEndpointResolver;
use Smithy\Client\Interceptor\InterceptorChain;
use Smithy\Client\Plugin\PluginState;
use Smithy\Client\Protocol\ProtocolResolverInterface;
use Smithy\Client\Retry\RetryState;
use Smithy\Client\Retry\RetryStrategyInterface;
use Smithy\Client\Retry\StandardRetryStrategy;
use Smithy\Client\Retry\TokenAcquisitionFailedException;
use Smithy\Core\Transport\{
    MessageExchangeInterface,
    TransportRequestInterface,
    TransportResponseInterface
};
use Smithy\Core\Exception\ErrorFault;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ServiceInterface;
use Smithy\Core\Shape\ShapeType;
use Smithy\Http\Message\{
    HttpMessageExchange,
    HttpTransportRequest,
    HttpTransportResponse,
    Request,
    ResourceRequestStream,
    Response
};
use Smithy\Http\Message\ResponseInterface as SmithyResponseInterface;
use Smithy\Http\Message\Uri;
use Smithy\Http\Client\HttpClientInterface;
use Smithy\Http\Client\Connection\ConnectionManagerInterface;
use Smithy\Http\Client\Configuration\ConnectConfiguration;
use Smithy\Http\Client\Configuration\HTTPVersionPolicy;
use Smithy\Http\Client\CurlClient;
use Smithy\Http\Client\Exception\HttpException;
use Smithy\Http\Client\HttpRequestOptions;
use Smithy\Protocol\ProtocolInterface;
use Smithy\Tests\Utils\Http\MockHttpClient;

/**
 * Integration tests for standard retry metadata wiring.
 */
final class StandardRetryPluginTest extends TestCase
{
    public function testAbstractAwsClientAddsStandardRetryInterceptor(): void
    {
        $client = $this->createClient(
            protocol: new TestRetryProtocol(),
            httpClient: new TestHttpClient(),
            retryStrategy: new RecordingRetryStrategy(),
        );

        $this->assertTrue(
            $client->getConfig()->interceptorChain->contains(
                StandardRetryInterceptor::class
            )
        );
    }

    public function testTransportFailureIsWrappedForStrategyAndUnwrappedForCaller(): void
    {
        $strategy = new RecordingRetryStrategy();
        $httpClient = (new TestHttpClient())->queueException(
            new HttpException(
                'transport failed',
                new Request('POST', new Uri('https://example.test'))
            )
        );
        $client = $this->createClient(
            protocol: new TestRetryProtocol(),
            httpClient: $httpClient,
            retryStrategy: $strategy
        );

        try {
            $client->executeOperation(TestOperation::instance(), TestInput::create());
            $this->fail('Expected exception was not thrown');
        } catch (HttpException $error) {
            $this->assertInstanceOf(
                RetryMetadataException::class,
                $strategy->seenError
            );
            $this->assertTrue($strategy->seenError->retryable);
            $this->assertFalse($strategy->seenError->throttling);
            $this->assertNull($strategy->seenError->retryAfterSeconds);
            $this->assertSame(
                $error,
                RetryMetadataException::unwrap($strategy->seenError)
            );
        }
    }

    public function testHttpFailureCarriesRetryAfterAndThrottlingMetadata(): void
    {
        $strategy = new RecordingRetryStrategy();
        $httpClient = (new TestHttpClient())->queueResponse(
            new Response(503, ['x-amz-retry-after' => '1500'])
        );
        $protocol = new class implements ProtocolInterface {
            public function getId(): string
            {
                return 'smithy.tests#retryTest';
            }

            public function getMessageExchange(): MessageExchangeInterface
            {
                return HttpMessageExchange::instance();
            }

            public function serializeRequest(
                OperationInterface $operation,
                SerializableStructInterface $input,
            ): TransportRequestInterface {
                return new HttpTransportRequest(
                    new Request('POST', new Uri('/'), [], '')
                );
            }

            public function setServiceEndpoint(
                TransportRequestInterface $request,
                Endpoint $endpoint,
            ): TransportRequestInterface {
                $request = HttpTransportRequest::expect($request);

                return $request->withRequest(
                    $request->request->withUri(new Uri($endpoint->url))
                );
            }

            public function deserializeResponse(
                OperationInterface $operation,
                TransportResponseInterface $response,
            ): SerializableStructInterface {
                $response = HttpTransportResponse::expect($response)->response;

                throw new AwsException(
                    message: 'slow down',
                    fault: ErrorFault::Server,
                    awsErrorCode: 'SlowDown',
                    requestId: 'abc123',
                    httpStatusCode: $response->getStatusCode()
                );
            }
        };
        $client = $this->createClient(
            protocol: $protocol,
            httpClient: $httpClient,
            retryStrategy: $strategy
        );

        try {
            $client->executeOperation(TestOperation::instance(), TestInput::create());
            $this->fail('Expected exception was not thrown');
        } catch (AwsException $error) {
            $this->assertInstanceOf(
                RetryMetadataException::class,
                $strategy->seenError
            );
            $this->assertTrue($strategy->seenError->retryable);
            $this->assertTrue($strategy->seenError->throttling);
            $this->assertSame(1.5, $strategy->seenError->retryAfterSeconds);
            $this->assertSame(
                $error,
                RetryMetadataException::unwrap($strategy->seenError)
            );
        }
    }

    public function testModeledRetryableErrorIsWrappedForStrategy(): void
    {
        $strategy = new RecordingRetryStrategy();
        $httpClient = (new TestHttpClient())->queueResponse(new Response(400));
        $protocol = new class implements ProtocolInterface {
            public function getId(): string
            {
                return 'smithy.tests#retryTest';
            }

            public function getMessageExchange(): MessageExchangeInterface
            {
                return HttpMessageExchange::instance();
            }

            public function serializeRequest(
                OperationInterface $operation,
                SerializableStructInterface $input,
            ): TransportRequestInterface {
                return new HttpTransportRequest(
                    new Request('POST', new Uri('/'), [], '')
                );
            }

            public function setServiceEndpoint(
                TransportRequestInterface $request,
                Endpoint $endpoint,
            ): TransportRequestInterface {
                $request = HttpTransportRequest::expect($request);

                return $request->withRequest(
                    $request->request->withUri(new Uri($endpoint->url))
                );
            }

            public function deserializeResponse(
                OperationInterface $operation,
                TransportResponseInterface $response,
            ): SerializableStructInterface {
                throw new ModeledRetryableError('retry me');
            }
        };
        $client = $this->createClient(
            protocol: $protocol,
            httpClient: $httpClient,
            retryStrategy: $strategy
        );

        try {
            $client->executeOperation(TestOperation::instance(), TestInput::create());
            $this->fail('Expected exception was not thrown');
        } catch (ModeledRetryableError $error) {
            $this->assertInstanceOf(
                RetryMetadataException::class,
                $strategy->seenError
            );
            $this->assertTrue($strategy->seenError->retryable);
            $this->assertFalse($strategy->seenError->throttling);
            $this->assertNull($strategy->seenError->retryAfterSeconds);
            $this->assertSame(
                $error,
                RetryMetadataException::unwrap($strategy->seenError)
            );
        }
    }

    public function testModeledThrottlingErrorIsWrappedForStrategy(): void
    {
        $strategy = new RecordingRetryStrategy();
        $httpClient = (new TestHttpClient())->queueResponse(new Response(400));
        $protocol = new class implements ProtocolInterface {
            public function getId(): string
            {
                return 'smithy.tests#retryTest';
            }

            public function getMessageExchange(): MessageExchangeInterface
            {
                return HttpMessageExchange::instance();
            }

            public function serializeRequest(
                OperationInterface $operation,
                SerializableStructInterface $input,
            ): TransportRequestInterface {
                return new HttpTransportRequest(
                    new Request('POST', new Uri('/'), [], '')
                );
            }

            public function setServiceEndpoint(
                TransportRequestInterface $request,
                Endpoint $endpoint,
            ): TransportRequestInterface {
                $request = HttpTransportRequest::expect($request);

                return $request->withRequest(
                    $request->request->withUri(new Uri($endpoint->url))
                );
            }

            public function deserializeResponse(
                OperationInterface $operation,
                TransportResponseInterface $response,
            ): SerializableStructInterface {
                throw new ModeledThrottlingError('slow down');
            }
        };
        $client = $this->createClient(
            protocol: $protocol,
            httpClient: $httpClient,
            retryStrategy: $strategy
        );

        try {
            $client->executeOperation(TestOperation::instance(), TestInput::create());
            $this->fail('Expected exception was not thrown');
        } catch (ModeledThrottlingError $error) {
            $this->assertInstanceOf(
                RetryMetadataException::class,
                $strategy->seenError
            );
            $this->assertTrue($strategy->seenError->retryable);
            $this->assertTrue($strategy->seenError->throttling);
            $this->assertNull($strategy->seenError->retryAfterSeconds);
            $this->assertSame(
                $error,
                RetryMetadataException::unwrap($strategy->seenError)
            );
        }
    }

    public function testSeekableStreamIsRewoundBeforeRetry(): void
    {
        $body = ResourceRequestStream::temp('payload');
        $httpClient = (new MockHttpClient())
            ->queueHandler(static function (
                RequestInterface $request
            ): ResponseInterface {
                self::assertSame('payload', (string) $request->getBody());

                return new Response(500, [], 'transient');
            })
            ->queueHandler(static function (
                RequestInterface $request
            ): ResponseInterface {
                self::assertSame('payload', (string) $request->getBody());

                return new Response(200, [], 'ok');
            });
        $client = $this->createClient(
            protocol: new TestRetryProtocol($body, failOnServerError: true),
            httpClient: $httpClient,
            retryStrategy: $this->createRetryStrategy()
        );

        $output = $client->executeOperation(
            TestOperation::instance(),
            TestInput::create()
        );

        $this->assertSame(TestOutput::class, $output::class);
        $this->assertSame(2, $httpClient->sendCallCount);
    }

    public function testReplayableResourceIsReopenedBeforeRetry(): void
    {
        $openCount = 0;
        $body = ResourceRequestStream::create(
            static function () use (&$openCount) {
                ++$openCount;
                $resource = \fopen('php://temp', 'r+');
                if ($resource === false) {
                    throw new \RuntimeException(
                        'Unable to create test resource.'
                    );
                }
                \fwrite($resource, 'payload');
                \rewind($resource);

                return $resource;
            },
            7
        );
        $httpClient = (new MockHttpClient())
            ->queueHandler(static function (
                RequestInterface $request
            ): ResponseInterface {
                self::assertSame('payload', (string) $request->getBody());

                return new Response(500, [], 'transient');
            })
            ->queueHandler(static function (
                RequestInterface $request
            ): ResponseInterface {
                self::assertSame('payload', (string) $request->getBody());

                return new Response(200, [], 'ok');
            });
        $client = $this->createClient(
            protocol: new TestRetryProtocol($body, failOnServerError: true),
            httpClient: $httpClient,
            retryStrategy: $this->createRetryStrategy()
        );

        $output = $client->executeOperation(
            TestOperation::instance(),
            TestInput::create()
        );

        $this->assertSame(TestOutput::class, $output::class);
        $this->assertSame(2, $httpClient->sendCallCount);
        $this->assertSame(2, $openCount);
    }

    public function testReplayableResourceRetriesInterruptedCurlUpload(): void
    {
        if (!\extension_loaded('curl')) {
            self::markTestSkipped('The cURL extension is required.');
        }

        $payload = \str_repeat('0123456789abcdef', 256 * 1024);
        $payloadLength = \strlen($payload);
        $payloadHash = \hash('sha256', $payload);
        $path = \tempnam(\sys_get_temp_dir(), 'smithy-retry-body-');
        if ($path === false) {
            $this->fail('Unable to create retry upload payload.');
        }
        if (\file_put_contents($path, $payload) !== $payloadLength) {
            @\unlink($path);
            $this->fail('Unable to write retry upload payload.');
        }
        unset($payload);

        $server = null;
        $body = null;
        $httpClient = null;
        $openedResources = [];

        try {
            $server = RetryUploadServerFixture::start();
            $body = ResourceRequestStream::create(
                static function () use ($path, &$openedResources) {
                    $resource = \fopen($path, 'rb');
                    if ($resource === false) {
                        throw new \RuntimeException(
                            'Unable to open retry upload payload.'
                        );
                    }
                    $openedResources[] = $resource;

                    return $resource;
                },
                $payloadLength
            );
            $httpClient = new CurlClient(
                connectConfiguration: new ConnectConfiguration(
                    versionPolicy: HTTPVersionPolicy::EnforceHTTP_1_1
                ),
                defaultOptions: new HttpRequestOptions(
                    timeout: 5.0,
                    readTimeout: 5.0
                )
            );
            $client = $this->createClient(
                protocol: new TestRetryProtocol($body),
                httpClient: $httpClient,
                retryStrategy: $this->createRetryStrategy(),
                endpoint: $server->endpoint()
            );

            $output = $client->executeOperation(
                TestOperation::instance(),
                TestInput::create()
            );
            $capture = $server->capture();

            $this->assertSame(TestOutput::class, $output::class);
            $this->assertCount(2, $openedResources);
            $this->assertFalse(\is_resource($openedResources[0]));
            $this->assertTrue(\is_resource($openedResources[1]));
            $this->assertCount(2, $capture['attempts']);
            $this->assertSame(
                64 * 1024,
                $capture['attempts'][0]['body_bytes']
            );
            $this->assertLessThan(
                $payloadLength,
                $capture['attempts'][0]['body_bytes']
            );
            $this->assertSame(
                $payloadLength,
                $capture['attempts'][1]['body_bytes']
            );
            $this->assertSame(
                $payloadHash,
                $capture['attempts'][1]['sha256']
            );
            $this->assertSame('POST', $capture['attempts'][0]['method']);
            $this->assertSame('POST', $capture['attempts'][1]['method']);
            $this->assertTrue($body->started());
            $this->assertTrue($body->fullyConsumed());

            $body->close();
            $this->assertFalse(\is_resource($openedResources[1]));
        } finally {
            $body?->close();
            $httpClient?->getConnectionManager()->clear();
            $server?->stop();
            @\unlink($path);
        }
    }

    public function testNonSeekableStreamWithResponseIsNotRetried(): void
    {
        $httpClient = (new MockHttpClient())
            ->queueResponse(new Response(500, [], 'transient'))
            ->queueResponse(new Response(200, [], 'ok'));
        $client = $this->createClient(
            protocol: new TestRetryProtocol(
                new NonSeekableTestStream('payload'),
                failOnServerError: true
            ),
            httpClient: $httpClient,
            retryStrategy: $this->createRetryStrategy()
        );

        try {
            $client->executeOperation(
                TestOperation::instance(),
                TestInput::create()
            );
            $this->fail('Expected exception was not thrown');
        } catch (AwsException $error) {
            $this->assertSame('transient', $error->getMessage());
            $this->assertSame(1, $httpClient->sendCallCount);
        }
    }

    public function testNonSeekableStreamNotStartedTransportErrorRetries(): void
    {
        $httpClient = (new MockHttpClient())
            ->queueException(new HttpException(
                'connect failed',
                new Request('POST', new Uri('https://example.test')),
                requestBodyStarted: false,
                requestBodyFullyConsumed: false,
                requestBodySeekable: false
            ))
            ->queueResponse(new Response(200, [], 'ok'));
        $client = $this->createClient(
            protocol: new TestRetryProtocol(
                new NonSeekableTestStream('payload')
            ),
            httpClient: $httpClient,
            retryStrategy: $this->createRetryStrategy()
        );

        $output = $client->executeOperation(
            TestOperation::instance(),
            TestInput::create()
        );

        $this->assertSame(TestOutput::class, $output::class);
        $this->assertSame(2, $httpClient->sendCallCount);
    }

    public function testNonSeekableStreamStartedTransportErrorIsNotRetried(): void
    {
        $httpClient = (new MockHttpClient())
            ->queueException(new HttpException(
                'upload failed',
                new Request('POST', new Uri('https://example.test')),
                requestBodyStarted: true,
                requestBodyFullyConsumed: false,
                requestBodySeekable: false
            ))
            ->queueResponse(new Response(200, [], 'ok'));
        $client = $this->createClient(
            protocol: new TestRetryProtocol(
                new NonSeekableTestStream('payload')
            ),
            httpClient: $httpClient,
            retryStrategy: $this->createRetryStrategy()
        );

        try {
            $client->executeOperation(
                TestOperation::instance(),
                TestInput::create()
            );
            $this->fail('Expected exception was not thrown');
        } catch (HttpException $error) {
            $this->assertSame('upload failed', $error->getMessage());
            $this->assertSame(1, $httpClient->sendCallCount);
        }
    }

    public function testUnknownNonSeekableTransportStateIsNotRetried(): void
    {
        $httpClient = (new MockHttpClient())
            ->queueException(new HttpException(
                'unknown upload state',
                new Request('POST', new Uri('https://example.test'))
            ))
            ->queueResponse(new Response(200, [], 'ok'));
        $client = $this->createClient(
            protocol: new TestRetryProtocol(
                new NonSeekableTestStream('payload')
            ),
            httpClient: $httpClient,
            retryStrategy: $this->createRetryStrategy()
        );

        try {
            $client->executeOperation(
                TestOperation::instance(),
                TestInput::create()
            );
            $this->fail('Expected exception was not thrown');
        } catch (HttpException $error) {
            $this->assertSame('unknown upload state', $error->getMessage());
            $this->assertSame(1, $httpClient->sendCallCount);
        }
    }

    public function testStringBodyRetriesNormally(): void
    {
        $httpClient = (new MockHttpClient())
            ->queueResponse(new Response(500, [], 'transient'))
            ->queueResponse(new Response(200, [], 'ok'));
        $client = $this->createClient(
            protocol: new TestRetryProtocol('payload', failOnServerError: true),
            httpClient: $httpClient,
            retryStrategy: $this->createRetryStrategy()
        );

        $output = $client->executeOperation(
            TestOperation::instance(),
            TestInput::create()
        );

        $this->assertSame(TestOutput::class, $output::class);
        $this->assertSame(2, $httpClient->sendCallCount);
    }

    private function createClient(
        ProtocolInterface $protocol,
        HttpClientInterface $httpClient,
        RetryStrategyInterface $retryStrategy,
        string $endpoint = 'https://example.test',
    ): RetryTestAwsClient {
        return new RetryTestAwsClient(
            new TestRetryAwsClientConfig(
                protocolInstance: $protocol,
                endpointResolverInstance: new StaticEndpointResolver(
                    new Endpoint($endpoint)
                ),
                httpClientInstance: $httpClient,
                region: 'us-east-1',
                credentials: AnonymousIdentityResolver::instance(),
                retryStrategy: $retryStrategy
            )
        );
    }

    private function createRetryStrategy(): StandardRetryStrategy
    {
        return new StandardRetryStrategy(
            baseDelay: 0.0,
            throttlingBaseDelay: 0.0
        );
    }
}

final class RetryTestAwsClient extends AbstractAwsClient
{
    public function __construct(TestRetryAwsClientConfig $config)
    {
        parent::__construct(
            $config->withService(TestRetryService::instance())
        );
    }
}

final class TestRetryService implements ServiceInterface
{
    private static ?self $instance = null;
    private static ?Schema $schema = null;

    private function __construct() {}

    public static function instance(): self
    {
        return self::$instance ??= new self();
    }

    public function getName(): string
    {
        return 'RetryTest';
    }

    public function getId(): string
    {
        return 'smithy.tests#RetryTest';
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
            traitsById: ['smithy.tests#retryTest' => true]
        );
    }

    public function getOperations(): array
    {
        return [TestOperation::instance()];
    }

    public function getOperation(string $name): ?OperationInterface
    {
        return \strcasecmp($name, TestOperation::instance()->getName()) === 0
            ? TestOperation::instance()
            : null;
    }
}

final class RecordingRetryStrategy implements RetryStrategyInterface
{
    public ?RetryMetadataException $seenError = null;

    public function begin(string $scope, int $requestFlags = 0): RetryState
    {
        return new RetryState($scope, $requestFlags);
    }

    public function refresh(RetryState $state, \Throwable $error): float
    {
        if ($error instanceof RetryMetadataException) {
            $this->seenError = $error;
        }

        throw new TokenAcquisitionFailedException(
            'stop retries',
            previous: $error,
            state: $state
        );
    }

    public function recordSuccess(RetryState $state): void {}

    public function maxAttempts(): int
    {
        return 1;
    }
}

final class TestRetryAwsClientConfig extends \Aws\Core\Client\AbstractAwsClientConfig
{
    public function __construct(
        private readonly ProtocolInterface $protocolInstance,
        private readonly StaticEndpointResolver $endpointResolverInstance,
        private readonly HttpClientInterface $httpClientInstance,
        string $region,
        \Smithy\Auth\IdentityResolverInterface
            |\Smithy\Auth\Aws\AwsCredentialsIdentityInterface $credentials,
        InterceptorChain $interceptors = new InterceptorChain(),
        array $supportedAuthSchemes = [],
        ?\Smithy\Client\Auth\AuthSchemeResolverInterface
            $authSchemeResolver = null,
        ?string $retryMode = null,
        ?int $maxAttempts = null,
        ?RetryStrategyInterface $retryStrategy = null,
        string $retryScope = '',
        array $context = [],
        ?PluginState $pluginState = null,
        ?ProtocolResolverInterface $protocolResolver = null,
        ?string $protocolId = null,
        ?ServiceInterface $service = null,
        ?bool $protocolIsExplicit = null
    ) {
        parent::__construct(
            region: $region,
            credentials: $credentials,
            interceptors: $interceptors,
            supportedAuthSchemes: $supportedAuthSchemes,
            authSchemeResolver: $authSchemeResolver,
            retryMode: $retryMode,
            maxAttempts: $maxAttempts,
            retryStrategy: $retryStrategy,
            retryScope: $retryScope,
            context: $context,
            httpClient: $httpClientInstance,
            pluginState: $pluginState,
            protocol: $protocolInstance,
            protocolResolver: $protocolResolver,
            protocolId: $protocolId,
            service: $service,
            protocolIsExplicit: $protocolIsExplicit
        );
    }

    protected function createProtocol(): ProtocolInterface
    {
        return $this->protocolInstance;
    }

    protected function getHttpClient(): HttpClientInterface {
        return $this->httpClientInstance;
    }

    protected function getEndpointResolver(): StaticEndpointResolver
    {
        return $this->endpointResolverInstance;
    }

    protected function getSigningName(): string
    {
        return 'test';
    }

    protected function copyWith(array $overrides): static
    {
        return new static(
            protocolInstance: \array_key_exists('protocol', $overrides)
                ? $overrides['protocol']
                : $this->protocolInstance,
            endpointResolverInstance: \array_key_exists(
                'endpointResolver',
                $overrides
            )
                ? $overrides['endpointResolver']
                : $this->endpointResolverInstance,
            httpClientInstance: $this->httpClientInstance,
            region: \array_key_exists('region', $overrides)
                ? $overrides['region']
                : $this->region,
            credentials: \array_key_exists('credentials', $overrides)
                ? $overrides['credentials']
                : $this->credentials,
            interceptors: \array_key_exists('interceptors', $overrides)
                ? $overrides['interceptors']
                : $this->interceptorChain,
            supportedAuthSchemes: \array_key_exists(
                'supportedAuthSchemes',
                $overrides
            )
                ? $overrides['supportedAuthSchemes']
                : $this->supportedAuthSchemes,
            authSchemeResolver: \array_key_exists(
                'authSchemeResolver',
                $overrides
            )
                ? $overrides['authSchemeResolver']
                : $this->authSchemeResolver,
            retryMode: \array_key_exists('retryMode', $overrides)
                ? $overrides['retryMode']
                : $this->retryMode,
            maxAttempts: \array_key_exists('maxAttempts', $overrides)
                ? $overrides['maxAttempts']
                : $this->maxAttempts,
            retryStrategy: \array_key_exists('retryStrategy', $overrides)
                ? $overrides['retryStrategy']
                : $this->retryStrategy,
            retryScope: \array_key_exists('retryScope', $overrides)
                ? $overrides['retryScope']
                : $this->retryScope,
            context: \array_key_exists('context', $overrides)
                ? $overrides['context']
                : $this->context,
            pluginState: \array_key_exists('pluginState', $overrides)
                ? $overrides['pluginState']
                : $this->getPluginState(),
            protocolResolver: \array_key_exists(
                'protocolResolver',
                $overrides
            )
                ? $overrides['protocolResolver']
                : $this->protocolResolver,
            protocolId: \array_key_exists('protocolId', $overrides)
                ? $overrides['protocolId']
                : $this->protocolId,
            service: \array_key_exists('service', $overrides)
                ? $overrides['service']
                : $this->service,
            protocolIsExplicit: \array_key_exists(
                'protocolIsExplicit',
                $overrides
            )
                ? $overrides['protocolIsExplicit']
                : null
        );
    }
}

final class TestHttpClient implements HttpClientInterface
{
    /** @var list<SmithyResponseInterface|\Throwable> */
    private array $queue = [];

    public function queueResponse(SmithyResponseInterface $response): self
    {
        $this->queue[] = $response;

        return $this;
    }

    public function queueException(\Throwable $error): self
    {
        $this->queue[] = $error;

        return $this;
    }

    public function getDefaultRequestOptions(): HttpRequestOptions
    {
        return new HttpRequestOptions();
    }

    public function sendRequest(
        RequestInterface $request,
        ?HttpRequestOptions $options = null
    ): ResponseInterface {
        $next = \array_shift($this->queue);
        if ($next instanceof \Throwable) {
            throw $next;
        }

        return $next ?? new Response();
    }

    public function sendMulti(
        array $requests,
        ?HttpRequestOptions $options = null
    ): array {
        $responses = [];
        foreach ($requests as $request) {
            $responses[] = $this->sendRequest($request, $options);
        }

        return $responses;
    }

    public function getConnectionManager(): ConnectionManagerInterface
    {
        throw new \LogicException('Not used in this test.');
    }

    public function close(): void {}
}

final class TestRetryProtocol implements ProtocolInterface
{
    public function getId(): string
    {
        return 'smithy.tests#retryTest';
    }

    public function getMessageExchange(): MessageExchangeInterface
    {
        return HttpMessageExchange::instance();
    }

    public function __construct(
        private readonly string|StreamInterface|null $body = '',
        private readonly bool $failOnServerError = false
    ) {}

    public function serializeRequest(
        OperationInterface $operation,
        SerializableStructInterface $input,
    ): TransportRequestInterface {
        return new HttpTransportRequest(
            new Request('POST', new Uri('/'), [], $this->body)
        );
    }

    public function setServiceEndpoint(
        TransportRequestInterface $request,
        Endpoint $endpoint,
    ): TransportRequestInterface {
        $request = HttpTransportRequest::expect($request);

        return $request->withRequest(
            $request->request->withUri(new Uri($endpoint->url))
        );
    }

    public function deserializeResponse(
        OperationInterface $operation,
        TransportResponseInterface $response,
    ): SerializableStructInterface {
        $response = HttpTransportResponse::expect($response)->response;

        if ($this->failOnServerError && $response->getStatusCode() >= 500) {
            throw new AwsException(
                message: (string) $response->getBody(),
                fault: ErrorFault::Server,
                awsErrorCode: 'InternalError',
                requestId: 'abc123',
                httpStatusCode: $response->getStatusCode()
            );
        }

        return TestOutput::create();
    }
}

final class NonSeekableTestStream implements StreamInterface
{
    private int $offset = 0;

    public function __construct(private readonly string $content) {}

    public function __toString(): string
    {
        return \substr($this->content, $this->offset);
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

    public function tell(): int
    {
        return $this->offset;
    }

    public function eof(): bool
    {
        return $this->offset >= \strlen($this->content);
    }

    public function isSeekable(): bool
    {
        return false;
    }

    public function seek(int $offset, int $whence = SEEK_SET): void
    {
        throw new \RuntimeException('Stream is not seekable.');
    }

    public function rewind(): void
    {
        throw new \RuntimeException('Stream is not seekable.');
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
        $chunk = \substr($this->content, $this->offset, $length);
        $this->offset += \strlen($chunk);

        return $chunk;
    }

    public function getContents(): string
    {
        $contents = \substr($this->content, $this->offset);
        $this->offset = \strlen($this->content);

        return $contents;
    }

    public function getMetadata(?string $key = null)
    {
        return $key === null ? [] : null;
    }
}

final class TestOperation implements OperationInterface
{
    private static ?self $instance = null;
    private static ?Schema $schema = null;

    public static function instance(): self
    {
        return self::$instance ??= new self();
    }

    private function __construct() {}

    public function getName(): string
    {
        return 'TestOperation';
    }

    public function getId(): string
    {
        return 'smithy.tests#TestOperation';
    }

    public function getServiceId(): ?string
    {
        return null;
    }

    public function getServiceExceptionClass(): string
    {
        return AwsException::class;
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
        return TestInput::class;
    }

    public function getOutputClass(): string
    {
        return TestOutput::class;
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
            id: 'smithy.tests#TestOperation',
            type: ShapeType::Operation
        );
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function inputSchema(): Schema
    {
        return TestInput::schema();
    }

    public function getOutputSchema(): Schema
    {
        return self::outputSchema();
    }

    public static function outputSchema(): Schema
    {
        return TestOutput::schema();
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

final class TestInput implements SerializableStructInterface
{
    use \Smithy\Core\Shape\WithMemberValueTrait;
    private static ?Schema $schema = null;

    public static function create(): self
    {
        return new self();
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function schema(): Schema
    {
        return self::$schema ??= new Schema(
            id: 'smithy.tests#TestInput',
            type: ShapeType::Structure
        );
    }

    public function serialize(ShapeSerializerInterface $serializer, int $idx): void
    {
        $serializer->serializeStruct(self::schema(), $this, $idx);
    }

    public function serializeMembers(ShapeSerializerInterface $serializer): void {}

    public function getMemberValue(Schema $member): mixed
    {
        return null;
    }
}

final class TestOutput implements SerializableStructInterface
{
    use \Smithy\Core\Shape\WithMemberValueTrait;
    private static ?Schema $schema = null;

    public static function create(): self
    {
        return new self();
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function schema(): Schema
    {
        return self::$schema ??= new Schema(
            id: 'smithy.tests#TestOutput',
            type: ShapeType::Structure
        );
    }

    public function serialize(ShapeSerializerInterface $serializer, int $idx): void
    {
        $serializer->serializeStruct(self::schema(), $this, $idx);
    }

    public function serializeMembers(ShapeSerializerInterface $serializer): void {}

    public function getMemberValue(Schema $member): mixed
    {
        return null;
    }
}

final class ModeledRetryableError extends \RuntimeException implements
    SerializableStructInterface
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
            id: 'smithy.tests#ModeledRetryableError',
            type: ShapeType::Structure,
            traits: [Schema::T_RETRYABLE => true]
        );
    }

    public function serialize(
        ShapeSerializerInterface $serializer,
        int $idx
    ): void {}

    public function serializeMembers(
        ShapeSerializerInterface $serializer
    ): void {}

    public function getMemberValue(Schema $member): mixed
    {
        return null;
    }
}

final class ModeledThrottlingError extends \RuntimeException implements
    SerializableStructInterface
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
            id: 'smithy.tests#ModeledThrottlingError',
            type: ShapeType::Structure,
            traits: [Schema::T_RETRYABLE => '{"throttling":true}']
        );
    }

    public function serialize(
        ShapeSerializerInterface $serializer,
        int $idx
    ): void {}

    public function serializeMembers(
        ShapeSerializerInterface $serializer
    ): void {}

    public function getMemberValue(Schema $member): mixed
    {
        return null;
    }
}
