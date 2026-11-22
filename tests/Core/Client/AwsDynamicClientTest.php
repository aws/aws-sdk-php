<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Client;

use Aws\Core\Client\{
    AwsDynamicClient,
    AwsDynamicClientConfig
};
use Aws\Core\S3\S3ErrorInterceptor;
use PHPUnit\Framework\Attributes\{
    CoversClass,
    DataProvider
};
use PHPUnit\Framework\TestCase;
use Smithy\Auth\Aws\AwsCredentials;
use Smithy\Auth\StaticTokenProvider;
use Smithy\Client\Retry\StandardRetryStrategy;
use Smithy\Core\Model\SmithyModel;
use Smithy\Protocol\Aws\{
    AwsJson1_0Protocol,
    AwsJson1_1Protocol,
    AwsProtocolException,
    AwsQueryProtocol,
    Ec2QueryProtocol,
    RestJsonProtocol,
    RestXmlProtocol
};
use Smithy\Tests\Utils\Http\MockHttpClient;

#[CoversClass(AwsDynamicClient::class)]
#[CoversClass(AwsDynamicClientConfig::class)]
final class AwsDynamicClientTest extends TestCase
{
    /**
     * @param class-string $protocolClass
     */
    #[DataProvider('awsProtocols')]
    public function testCallsAwsProtocolsWithResolvedConfiguration(
        string $protocolId,
        string $protocolClass
    ): void
    {
        $http = (new MockHttpClient())->willReturn('');
        $client = AwsDynamicClient::create(
            model: $this->model($protocolId),
            endpoint: 'https://example.amazonaws.com',
            httpClient: $http,
            context: ['testContext' => 'value'],
            region: 'us-west-2',
            credentials: new AwsCredentials('AKID', 'SECRET')
        );

        $client->echo();

        $config = $client->getConfig();
        $request = $http->getLastRequest();
        self::assertInstanceOf(AwsDynamicClientConfig::class, $config);
        self::assertInstanceOf($protocolClass, $config->protocol);
        self::assertSame($protocolId, $config->protocol->getId());
        self::assertInstanceOf(
            StandardRetryStrategy::class,
            $config->retryStrategy
        );
        self::assertSame('us-west-2', $config->region);
        self::assertSame('testservice', $config->signingName);
        self::assertSame('value', $config->context['testContext'] ?? null);
        self::assertNotNull($request);
        self::assertStringStartsWith(
            'AWS4-HMAC-SHA256 ',
            $request->getHeaderLine('Authorization')
        );

        if ($protocolId === 'aws.protocols#awsJson1_0'
            || $protocolId === 'aws.protocols#awsJson1_1'
        ) {
            self::assertSame(
                'ModeledTarget.Echo',
                $request->getHeaderLine('X-Amz-Target')
            );
            self::assertNull(
                $client->getOperation('Echo')?->getRequestTarget()
            );
        } elseif ($protocolId === 'aws.protocols#awsQuery'
            || $protocolId === 'aws.protocols#ec2Query'
        ) {
            self::assertSame(
                'Action=Echo&Version=2020-01-01',
                (string) $request->getBody()
            );
            self::assertNull(
                $client->getOperation('Echo')?->getRequestTarget()
            );
        } else {
            self::assertSame('/echo', $request->getUri()->getPath());
            self::assertNull(
                $client->getOperation('Echo')?->getRequestTarget()
            );
        }
    }

    /**
     * @return iterable<string, array{string, class-string}>
     */
    public static function awsProtocols(): iterable
    {
        yield 'awsJson1_0' => [
            AwsJson1_0Protocol::ID,
            AwsJson1_0Protocol::class
        ];
        yield 'awsJson1_1' => [
            AwsJson1_1Protocol::ID,
            AwsJson1_1Protocol::class
        ];
        yield 'restJson1' => [
            RestJsonProtocol::ID,
            RestJsonProtocol::class
        ];
        yield 'restXml' => [
            RestXmlProtocol::ID,
            RestXmlProtocol::class
        ];
        yield 'awsQuery' => [
            AwsQueryProtocol::ID,
            AwsQueryProtocol::class
        ];
        yield 'ec2Query' => [
            Ec2QueryProtocol::ID,
            Ec2QueryProtocol::class
        ];
    }

    public function testSendsTheAwsUserAgent(): void
    {
        $http = (new MockHttpClient())->willReturn('');
        $client = AwsDynamicClient::create(
            model: $this->model(RestJsonProtocol::ID),
            endpoint: 'https://example.amazonaws.com',
            httpClient: $http,
            region: 'us-west-2',
            credentials: new AwsCredentials('AKID', 'SECRET')
        );

        $client->echo();

        self::assertMatchesRegularExpression(
            '~^aws-sdk-php/\S+ ua/2\.1 api/test_service#\S+ ~',
            $http->getLastRequest()?->getHeaderLine('User-Agent') ?? ''
        );
    }

    public function testWaiterPollsCarryTheWaiterMetric(): void
    {
        $http = (new MockHttpClient())->fallbackResponse('', 200);
        $client = AwsDynamicClient::create(
            model: $this->model(RestJsonProtocol::ID, waiter: true),
            endpoint: 'https://example.amazonaws.com',
            httpClient: $http,
            region: 'us-west-2',
            credentials: new AwsCredentials('AKID', 'SECRET')
        );

        $client->waitUntil('Echoed', [], 5.0);
        $waiterHeader = $http->getLastRequest()?->getHeaderLine('User-Agent');
        $client->echo();
        $directHeader = $http->getLastRequest()?->getHeaderLine('User-Agent');

        self::assertMatchesRegularExpression(
            '~ m/\S*,B( |$)~',
            $waiterHeader ?? ''
        );
        self::assertStringNotContainsString(',B', $directHeader ?? '');
    }

    public function testAwsJsonTargetFallsBackToServiceName(): void
    {
        $http = (new MockHttpClient())->willReturn('');
        $client = AwsDynamicClient::create(
            model: $this->model(
                'aws.protocols#awsJson1_1',
                targetPrefix: null
            ),
            endpoint: 'https://example.amazonaws.com',
            httpClient: $http,
            region: 'us-west-2',
            credentials: new AwsCredentials('AKID', 'SECRET')
        );

        $client->echo();

        self::assertSame(
            'TestService.Echo',
            $http->getLastRequest()?->getHeaderLine('X-Amz-Target')
        );
    }

    public function testInfersSigV4WhenAuthDefinitionShapesAreMissing(): void
    {
        $http = (new MockHttpClient())->willReturn('');
        $client = AwsDynamicClient::create(
            model: $this->model(
                'aws.protocols#restJson1',
                includeAuthMetadata: false
            ),
            endpoint: 'https://example.amazonaws.com',
            httpClient: $http,
            region: 'us-west-2',
            credentials: new AwsCredentials('AKID', 'SECRET')
        );

        $client->echo();

        self::assertStringStartsWith(
            'AWS4-HMAC-SHA256 ',
            $http->getLastRequest()?->getHeaderLine('Authorization') ?? ''
        );
        self::assertSame(
            ['aws.auth#sigv4'],
            $client->getService()
                ->getOperation('Echo')
                ?->getEffectiveAuthSchemes()
        );
    }

    /**
     * @return array<string, array{0: string, 1: string}>
     */
    public static function unsignedPayloadEndpoints(): array
    {
        return [
            'https leaves the payload unsigned' => [
                'https://example.amazonaws.com',
                'UNSIGNED-PAYLOAD'
            ],
            'http signs the payload' => [
                'http://example.amazonaws.com',
                \hash('sha256', '')
            ]
        ];
    }

    #[DataProvider('unsignedPayloadEndpoints')]
    public function testUnsignedPayloadTraitAppliesOnlyOverHttps(
        string $endpoint,
        string $expectedHash
    ): void
    {
        $http = (new MockHttpClient())->willReturn('');
        $client = AwsDynamicClient::create(
            model: $this->model(
                'aws.protocols#restJson1',
                unsignedPayload: true
            ),
            endpoint: $endpoint,
            httpClient: $http,
            region: 'us-west-2',
            credentials: new AwsCredentials('AKID', 'SECRET')
        );

        $client->echo();

        self::assertSame(
            $expectedHash,
            $http->getLastRequest()?->getHeaderLine('X-Amz-Content-Sha256')
        );
    }

    public function testUsesAwsEndpointFunctionsFromDefaultRuntime(): void
    {
        $http = (new MockHttpClient())->willReturn('');
        $client = AwsDynamicClient::create(
            model: $this->model(
                'aws.protocols#restJson1',
                [
                    'version' => '1.1',
                    'parameters' => [
                        'Region' => [
                            'type' => 'String',
                            'required' => true
                        ]
                    ],
                    'conditions' => [
                        [
                            'fn' => 'aws.partition',
                            'argv' => [
                                ['ref' => 'Region']
                            ],
                            'assign' => 'partition'
                        ]
                    ],
                    'results' => [
                        [
                            'type' => 'endpoint',
                            'endpoint' => [
                                'url' => 'https://example.amazonaws.com',
                                'properties' => []
                            ]
                        ]
                    ],
                    'nodes' => '',
                    'nodeCount' => 0,
                    'root' => 100_000_001
                ]
            ),
            httpClient: $http,
            region: 'us-west-2',
            credentials: new AwsCredentials('AKID', 'SECRET')
        );

        $client->echo();

        self::assertSame(
            'example.amazonaws.com',
            $http->getLastRequest()?->getUri()->getHost()
        );
    }

    public function testUsesConfiguredBearerAuthPreference(): void
    {
        $http = (new MockHttpClient())->willReturn('');
        $client = AwsDynamicClient::create(
            model: $this->model(
                'aws.protocols#restJson1',
                usesBearerAuth: true
            ),
            endpoint: 'https://example.amazonaws.com',
            httpClient: $http,
            region: 'us-west-2',
            credentials: new AwsCredentials('AKID', 'SECRET'),
            tokenProvider: new StaticTokenProvider('preview-token'),
            authSchemePreference: ['httpBearerAuth']
        );

        $client->echo();

        self::assertSame(
            'Bearer preview-token',
            $http->getLastRequest()?->getHeaderLine('Authorization')
        );
    }

    public function testS3ClientInfersNotFoundForEmptyBody404(): void
    {
        $http = (new MockHttpClient())->willReturn(
            '',
            404,
            ['x-amz-request-id' => 'req-1', 'x-amz-id-2' => 'host-1']
        );
        $client = $this->s3Client($http);

        try {
            $client->headObject();
            self::fail('Expected a NotFound error.');
        } catch (AwsProtocolException $error) {
        }

        self::assertTrue(
            $client->getConfig()->interceptorChain->contains(
                S3ErrorInterceptor::class
            )
        );
        self::assertSame('NotFound', $error->getAwsErrorCode());
        self::assertSame('req-1', $error->getAwsRequestId());
        self::assertSame(404, $error->getHttpStatusCode());
        self::assertSame('HTTP 404: NotFound', $error->getMessage());
        self::assertSame('host-1', $error->getExtendedRequestId());
    }

    public function testS3ClientReadsHostIdFromErrorBody(): void
    {
        $http = (new MockHttpClient())->willReturn(
            '<Error><Code>AccessDenied</Code>'
                . '<Message>Access Denied</Message>'
                . '<RequestId>req-2</RequestId>'
                . '<HostId>host-2</HostId></Error>',
            403
        );

        try {
            $this->s3Client($http)->headObject();
            self::fail('Expected an AccessDenied error.');
        } catch (AwsProtocolException $error) {
        }

        self::assertSame('AccessDenied', $error->getAwsErrorCode());
        self::assertSame('req-2', $error->getAwsRequestId());
        self::assertSame('host-2', $error->getExtendedRequestId());
    }

    public function testS3ClientLeavesTheBucketToTheEndpoint(): void
    {
        $http = (new MockHttpClient())->willReturn('');
        $client = $this->s3AddressingClient($http);

        $client->getObject(['Bucket' => 'bucket-name', 'Key' => 'a/b']);

        self::assertSame(
            'https://s3.us-west-2.amazonaws.com/a/b?x-id=GetObject',
            (string) $http->getLastRequest()?->getUri()
        );
    }

    public static function s3KeysWithEmptyOrDotSegments(): array
    {
        return [
            'double slash' => ['a//b', '/a//b'],
            'leading slash' => ['/lead', '//lead'],
            'trailing slash' => ['trail/', '/trail/'],
            'dot dot segment' => ['x/../y', '/x/../y'],
            'dot segment' => ['x/./y', '/x/./y'],
        ];
    }

    #[DataProvider('s3KeysWithEmptyOrDotSegments')]
    public function testS3ClientSendsKeysWithEmptyAndDotSegmentsAsGiven(
        string $key,
        string $expectedPath
    ): void
    {
        $http = (new MockHttpClient())->willReturn('');
        $client = $this->s3AddressingClient($http);

        $client->getObject(['Bucket' => 'bucket-name', 'Key' => $key]);

        self::assertSame(
            'https://s3.us-west-2.amazonaws.com'
                . $expectedPath . '?x-id=GetObject',
            (string) $http->getLastRequest()?->getUri()
        );
    }

    public function testS3ClientRejectsPathStyleWithAccelerateAtCreation(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'Path-style addressing cannot be used with S3 Accelerate.'
        );

        $this->s3AddressingClient(
            new MockHttpClient(),
            ['ForcePathStyle' => true, 'Accelerate' => true]
        );
    }

    public function testNonS3ClientOmitsS3ErrorInterceptor(): void
    {
        $client = AwsDynamicClient::create(
            model: $this->model(RestXmlProtocol::ID),
            endpoint: 'https://example.amazonaws.com',
            httpClient: new MockHttpClient(),
            region: 'us-west-2',
            credentials: new AwsCredentials('AKID', 'SECRET')
        );

        self::assertFalse(
            $client->getConfig()->interceptorChain->contains(
                S3ErrorInterceptor::class
            )
        );
    }

    /**
     * Build a dynamic S3 client on the regional S3 endpoint.
     *
     * @param array<string, mixed> $endpointParameters
     */
    private function s3AddressingClient(
        MockHttpClient $http,
        array $endpointParameters = []
    ): AwsDynamicClient
    {
        $bucket = [
            'target' => 'smithy.api#String',
            'traits' => [
                'smithy.api#httpLabel' => [],
                'smithy.api#required' => [],
                'smithy.rules#contextParam' => ['name' => 'Bucket']
            ]
        ];
        $operation = static fn(string $input, string $uri): array => [
            'type' => 'operation',
            'input' => ['target' => $input],
            'output' => ['target' => 'smithy.api#Unit'],
            'traits' => [
                'smithy.api#http' => [
                    'method' => 'GET',
                    'uri' => $uri,
                    'code' => 200
                ]
            ]
        ];

        return AwsDynamicClient::create(
            model: SmithyModel::fromArray([
                'smithy' => '2.0',
                'shapes' => [
                    'example#S3' => [
                        'type' => 'service',
                        'version' => '2006-03-01',
                        'operations' => [
                            ['target' => 'example#ListObjects'],
                            ['target' => 'example#GetObject']
                        ],
                        'traits' => [
                            'aws.api#service' => [
                                'sdkId' => 'S3',
                                'endpointPrefix' => 's3'
                            ],
                            'aws.auth#sigv4' => ['name' => 's3'],
                            'aws.protocols#restXml' => [
                                'noErrorWrapping' => true
                            ]
                        ]
                    ],
                    'example#ListObjects' => $operation(
                        'example#ListObjectsInput',
                        '/{Bucket}'
                    ),
                    'example#ListObjectsInput' => [
                        'type' => 'structure',
                        'members' => ['Bucket' => $bucket],
                        'traits' => ['smithy.api#input' => []]
                    ],
                    'example#GetObject' => $operation(
                        'example#GetObjectInput',
                        '/{Bucket}/{Key+}?x-id=GetObject'
                    ),
                    'example#GetObjectInput' => [
                        'type' => 'structure',
                        'members' => [
                            'Bucket' => $bucket,
                            'Key' => [
                                'target' => 'smithy.api#String',
                                'traits' => [
                                    'smithy.api#httpLabel' => [],
                                    'smithy.api#required' => []
                                ]
                            ]
                        ],
                        'traits' => ['smithy.api#input' => []]
                    ]
                ]
            ]),
            httpClient: $http,
            endpoint: 'https://s3.us-west-2.amazonaws.com',
            endpointParameters: $endpointParameters,
            region: 'us-west-2',
            credentials: new AwsCredentials('AKID', 'SECRET')
        );
    }

    private function s3Client(MockHttpClient $http): AwsDynamicClient
    {
        return AwsDynamicClient::create(
            model: SmithyModel::fromArray([
                'smithy' => '2.0',
                'shapes' => [
                    'example#S3' => [
                        'type' => 'service',
                        'version' => '2006-03-01',
                        'operations' => [
                            ['target' => 'example#HeadObject']
                        ],
                        'traits' => [
                            'aws.api#service' => [
                                'sdkId' => 'S3',
                                'endpointPrefix' => 's3'
                            ],
                            'aws.auth#sigv4' => ['name' => 's3'],
                            'aws.protocols#restXml' => [
                                'noErrorWrapping' => true
                            ]
                        ]
                    ],
                    'example#HeadObject' => [
                        'type' => 'operation',
                        'input' => ['target' => 'example#HeadObjectInput'],
                        'output' => ['target' => 'example#HeadObjectOutput'],
                        'errors' => [['target' => 'example#NotFound']],
                        'traits' => [
                            'smithy.api#http' => [
                                'method' => 'GET',
                                'uri' => '/object',
                                'code' => 200
                            ]
                        ]
                    ],
                    'example#HeadObjectInput' => [
                        'type' => 'structure',
                        'members' => [],
                        'traits' => ['smithy.api#input' => []]
                    ],
                    'example#HeadObjectOutput' => [
                        'type' => 'structure',
                        'members' => [],
                        'traits' => ['smithy.api#output' => []]
                    ],
                    'example#NotFound' => [
                        'type' => 'structure',
                        'members' => [],
                        'traits' => ['smithy.api#error' => 'client']
                    ]
                ]
            ]),
            endpoint: 'https://example.amazonaws.com',
            httpClient: $http,
            region: 'us-east-1',
            credentials: new AwsCredentials('AKID', 'SECRET')
        );
    }

    /**
     * @param array<string, mixed>|null $endpointBdd
     * @param string|null $targetPrefix AWS JSON target prefix.
     */
    private function model(
        string $protocolId,
        ?array $endpointBdd = null,
        bool $usesBearerAuth = false,
        ?string $targetPrefix = 'ModeledTarget',
        bool $includeAuthMetadata = true,
        bool $unsignedPayload = false,
        bool $waiter = false
    ): SmithyModel
    {
        $operationTraits = [];
        if ($unsignedPayload) {
            $operationTraits['aws.auth#unsignedPayload'] = [];
        }
        if ($waiter) {
            $operationTraits['smithy.waiters#waitable'] = [
                'Echoed' => [
                    'acceptors' => [
                        [
                            'state' => 'success',
                            'matcher' => ['success' => true]
                        ]
                    ]
                ]
            ];
        }
        if ($protocolId === 'aws.protocols#restJson1'
            || $protocolId === 'aws.protocols#restXml'
        ) {
            $operationTraits['smithy.api#http'] = [
                'method' => 'POST',
                'uri' => '/echo',
                'code' => 200
            ];
        }
        $protocolTrait = [];
        if (($protocolId === 'aws.protocols#awsJson1_0'
                || $protocolId === 'aws.protocols#awsJson1_1')
            && $targetPrefix !== null
        ) {
            $protocolTrait['targetPrefix'] = $targetPrefix;
        }
        $serviceTraits = [
            'aws.api#service' => [
                'sdkId' => 'Test Service',
                'endpointPrefix' => 'testservice'
            ],
            'aws.auth#sigv4' => [
                'name' => 'testservice'
            ],
            $protocolId => $protocolTrait,
            'smithy.api#xmlNamespace' => [
                'uri' => 'https://example.com/'
            ]
        ];
        if ($endpointBdd !== null) {
            $serviceTraits['smithy.rules#endpointBdd'] = $endpointBdd;
        }
        $serviceAuth = ['aws.auth#sigv4'];
        $shapes = [];
        if ($includeAuthMetadata) {
            $shapes['aws.auth#sigv4'] = [
                'type' => 'structure',
                'members' => [],
                'traits' => [
                    'smithy.api#authDefinition' => []
                ]
            ];
        }
        if ($usesBearerAuth) {
            $serviceAuth[] = 'smithy.api#httpBearerAuth';
            $serviceTraits['smithy.api#httpBearerAuth'] = [];
            $shapes['smithy.api#httpBearerAuth'] = [
                'type' => 'structure',
                'members' => [],
                'traits' => [
                    'smithy.api#authDefinition' => []
                ]
            ];
        }
        if ($includeAuthMetadata) {
            $serviceTraits['smithy.api#auth'] = $serviceAuth;
        }

        $shapes += [
            'example#TestService' => [
                'type' => 'service',
                'version' => '2020-01-01',
                'operations' => [
                    ['target' => 'example#Echo']
                ],
                'traits' => $serviceTraits
            ],
            'example#Echo' => [
                'type' => 'operation',
                'input' => ['target' => 'example#EchoInput'],
                'output' => ['target' => 'example#EchoOutput'],
                'traits' => $operationTraits
            ],
            'example#EchoInput' => [
                'type' => 'structure',
                'members' => [],
                'traits' => ['smithy.api#input' => []]
            ],
            'example#EchoOutput' => [
                'type' => 'structure',
                'members' => [],
                'traits' => ['smithy.api#output' => []]
            ]
        ];

        return SmithyModel::fromArray([
            'smithy' => '2.0',
            'shapes' => $shapes
        ]);
    }
}
