<?php

namespace Aws\Test\EndpointDiscovery;

use Aws\Api\Service;
use Aws\AwsClient;
use Aws\Command;
use Aws\CommandInterface;
use Aws\Credentials\CredentialProvider;
use Aws\Credentials\Credentials;
use Aws\EndpointDiscovery\Configuration;
use Aws\EndpointDiscovery\EndpointDiscoveryMiddleware;
use Aws\Exception\UnresolvedEndpointException;
use Aws\Result;
use Aws\ResultInterface;
use Aws\Sdk;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

/**
 * @covers \Aws\EndpointDiscovery\EndpointDiscoveryMiddleware
 */
class EndpointDiscoveryMiddlewareTest extends TestCase
{

    /**
     * @dataProvider getRequestTestCases
     * @param CommandInterface $command
     * @param array $clientArgs
     * @param ResultInterface $describeResult
     * @param RequestInterface $request
     * @param RequestInterface $expected
     */
    public function testCorrectlyModifiesRequest(
        CommandInterface $command,
        array $clientArgs,
        ResultInterface $describeResult,
        RequestInterface $request,
        RequestInterface $expected
    ) {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, $clientArgs);
        $list = $client->getHandlerList();
        $list->setHandler(function (CommandInterface $cmd, RequestInterface $req) use ($expected, $describeResult) {
            // Simulate the DescribeEndpoints API with the supplied result
            if ($cmd->getName() === 'DescribeEndpoints') {
                return Promise\promise_for($describeResult);
            }
            $this->assertEquals(
                $expected->getHeader('User-Agent'),
                $req->getHeader('User-Agent')
            );
            $uri = $req->getUri();
            $expectedUri = $expected->getUri();
            $this->assertEquals($expectedUri->getHost(), $uri->getHost());
            $this->assertEquals($expectedUri->getPath(), $uri->getPath());
            return Promise\promise_for(new Result([]));
        });
        $handler = $list->resolve();
        $handler($command, $request);
    }

    public function getRequestTestCases()
    {
        $baseUri = new Uri('https://awsendpointdiscoverytestservice.us-east-1.amazonaws.com');
        $baseUserAgent = 'aws-sdk-php/' . Sdk::VERSION;
        $baseRequest = new Request(
            'POST',
            $baseUri,
            [
                'User-Agent' => $baseUserAgent,
            ]
        );

        return [
            // Discovery optional, disabled by user
            [
                new Command('TestDiscoveryOptional', []),
                [
                    'endpoint_discovery' => ['enabled' => false],
                ],
                new Result([]),
                $baseRequest,
                $baseRequest,
            ],

            // Discovery optional, enabled by user
            [
                new Command('TestDiscoveryOptional', []),
                [
                    'endpoint_discovery' => ['enabled' => true],
                ],
                new Result([
                    'Endpoints' => [
                        [
                            'Address' => 'discovered.com/some/path',
                            'CachePeriodInMinutes' => 10,
                        ],
                    ],
                ]),
                $baseRequest,
                new Request(
                    'POST',
                    new Uri('https://discovered.com/some/path'),
                    [
                        'User-Agent' => $baseUserAgent . ' endpoint-discovery',
                    ]
                ),
            ],

            // Discovery optional, no configuration provided
            [
                new Command('TestDiscoveryOptional', []),
                [
                ],
                new Result([]),
                $baseRequest,
                $baseRequest,
            ],

            // Discovery required, disabled by user
            [
                new Command('TestDiscoveryRequired', []),
                [
                    'endpoint_discovery' => ['enabled' => false],
                ],
                new Result([
                    'Endpoints' => [
                        [
                            'Address' => 'discovered.com/some/path',
                            'CachePeriodInMinutes' => 10,
                        ],
                    ],
                ]),
                $baseRequest,
                new Request(
                    'POST',
                    new Uri('https://discovered.com/some/path'),
                    [
                        'User-Agent' => $baseUserAgent . ' endpoint-discovery',
                    ]
                ),
            ],

            // Discovery required, no config provided
            [
                new Command('TestDiscoveryRequired', []),
                [],
                new Result([
                    'Endpoints' => [
                        [
                            'Address' => 'discovered.com/some/path',
                            'CachePeriodInMinutes' => 10,
                        ],
                    ],
                ]),
                $baseRequest,
                new Request(
                    'POST',
                    new Uri('https://discovered.com/some/path'),
                    [
                        'User-Agent' => $baseUserAgent . ' endpoint-discovery',
                    ]
                ),
            ],

            // Discovery optional, enabled, custom endpoint supplied by user
            [
                new Command('TestDiscoveryOptional', []),
                [
                    'endpoint' => 'https://custom.com/custom/path',
                    'endpoint_discovery' => ['enabled' => true],
                ],
                new Result([
                    'Endpoints' => [
                        [
                            'Address' => 'discovered.com/some/path',
                            'CachePeriodInMinutes' => 10,
                        ],
                    ],
                ]),
                $baseRequest,
                new Request(
                    'POST',
                    new Uri('https://custom.com/custom/path'),
                    [
                        'User-Agent' => $baseUserAgent,
                    ]
                ),
            ],

            // Discovery required, enabled, custom endpoint supplied by user
            [
                new Command('TestDiscoveryRequired', []),
                [
                    'endpoint' => 'https://custom.com/custom/path',
                    'endpoint_discovery' => ['enabled' => true],
                ],
                new Result([
                    'Endpoints' => [
                        [
                            'Address' => 'discovered.com/some/path',
                            'CachePeriodInMinutes' => 10,
                        ],
                    ],
                ]),
                $baseRequest,
                new Request(
                    'POST',
                    new Uri('https://custom.com/custom/path'),
                    [
                        'User-Agent' => $baseUserAgent,
                    ]
                ),
            ],
        ];
    }

    /**
     * @dataProvider getDiscoveryRequestTestCases
     * @param $mainCmd
     * @param $expectedCmd
     * @param RequestInterface $expectedReq
     */
    public function testCorrectlyConstructsDiscoveryRequest(
        CommandInterface $mainCmd,
        CommandInterface $expectedCmd,
        RequestInterface $expectedReq
    ) {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service);
        $list = $client->getHandlerList();
        $list->setHandler(function (CommandInterface $cmd, RequestInterface $req) use ($expectedCmd, $expectedReq) {
            if ($cmd->getName() === 'DescribeEndpoints') {
                $this->assertEquals($expectedCmd->toArray(), $cmd->toArray());
                $this->assertEquals(
                    $expectedReq->getHeader('x-amz-api-header'),
                    $req->getHeader('x-amz-api-header')
                );
                return Promise\promise_for(new Result([
                    'Endpoints' => [
                        [
                            'Address' => 'discovered.com/some/path',
                            'CachePeriodInMinutes' => 10,
                        ],
                    ],
                ]));
            }
            return Promise\promise_for(new Result([]));
        });

        $handler = $list->resolve();
        $handler($mainCmd, new Request('POST', new Uri('https:/foo.com')));
    }

    public function getDiscoveryRequestTestCases()
    {
        $baseUri = new Uri('https://awsendpointdiscoverytestservice.us-east-1.amazonaws.com');
        $baseRequest = new Request(
            'POST',
            $baseUri,
            [
                'x-amz-api-version' => '2018-08-31',
            ]
        );

        return [
            [
                new Command('TestDiscoveryRequired', []),
                new Command('DescribeEndpoints', []),
                $baseRequest
            ],
            [
                new Command(
                    'TestDiscoveryIdentifiersRequired',
                    [
                        'Sdk' => 'foo'
                    ]
                ),
                new Command(
                    'DescribeEndpoints',
                    [
                        'Operation' => 'TestDiscoveryIdentifiersRequired',
                        'Identifiers' => [
                            'Sdk' => 'foo'
                        ]
                    ]
                ),
                $baseRequest
            ]
        ];
    }

    public function testThrowsExceptionWhenMarkedAsEndpointOperation()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service);
        $command = $client->getCommand('TestContradictoryOperation', []);
        $middleware = EndpointDiscoveryMiddleware::wrap(
            $client,
            [],
            $this->generateCredentials(),
            $service,
            new Configuration(true)
        );

        $list = $client->getHandlerList();
        $list->appendBuild($middleware);
        $handler = $list->resolve();
        try {
            $handler($command, new Request('POST', 'https://foo.com'));
            $this->fail('This operation should have failed with a UnresolvedEndpointException!');
        } catch (\Exception $e) {
            $this->assertEquals('This operation is contradictorily marked both as using endpoint discovery and being the endpoint discovery operation. Please verify the accuracy of your model files.', $e->getMessage());
            $this->assertInstanceOf(UnresolvedEndpointException::class, $e);
        }
    }

    private function generateCredentials()
    {
        $creds = new Credentials('testkey', 'testsecret');
        return CredentialProvider::fromCredentials($creds);
    }

    private function generateTestClient(Service $service, $args = [])
    {
        return new AwsClient(
            array_merge(
                [
                    'service'      => 'foo',
                    'api_provider' => function () use ($service) {
                        return $service->toArray();
                    },
                    'region'       => 'us-east-1',
                    'version'      => 'latest',
                ],
                $args
            )
        );
    }

    private function generateTestService()
    {
        return new Service(
            [
                "version" => "2.0",
                "metadata" => [
                    "apiVersion" => "2018-08-31",
                    "endpointPrefix" => "awsendpointdiscoverytestservice",
                    "jsonVersion" => "1.1",
                    "protocol" => "json",
                    "serviceAbbreviation" => "AwsEndpointDiscoveryTest",
                    "serviceFullName" => "AwsEndpointDiscoveryTest",
                    "signatureVersion" => "v4",
                    "signingName" => "awsendpointdiscoverytestservice",
                    "targetPrefix" => "AwsEndpointDiscoveryTestService"
                ],
                "operations" => [
                    "DescribeEndpoints" => [
                        "name" => "DescribeEndpoints",
                        "http" => [
                            "method" => "POST",
                            "requestUri" => "/"
                        ],
                        "input" => ["shape" => "DescribeEndpointsRequest"],
                        "output" => ["shape" => "DescribeEndpointsResponse"],
                        "endpointoperation" => true
                    ],
                    "TestContradictoryOperation" => [
                        "name" => "TestContradictoryOperation",
                        "http" => [
                            "method" => "POST",
                            "requestUri" => "/"
                        ],
                        "input" => ["shape" => "TestDiscoveryOptionalRequest"],
                        "output" => ["shape" => "TestDiscoveryOptionalResponse"],
                        "endpointdiscovery" => [],
                        "endpointoperation" => true
                    ],
                    "TestDiscoveryIdentifiersRequired" => [
                        "name" => "TestDiscoveryIdentifiersRequired",
                        "http" => [
                            "method" => "POST",
                            "requestUri" => "/"
                        ],
                        "input" => ["shape" => "TestDiscoveryIdentifiersRequiredRequest"],
                        "output" => ["shape" => "TestDiscoveryIdentifiersRequiredResponse"],
                        "endpointdiscovery" => ["required" => "true"]
                    ],
                    "TestDiscoveryOptional" => [
                        "name" => "TestDiscoveryOptional",
                        "http" => [
                            "method" => "POST",
                            "requestUri" => "/"
                        ],
                        "input" => ["shape" => "TestDiscoveryOptionalRequest"],
                        "output" => ["shape" => "TestDiscoveryOptionalResponse"],
                        "endpointdiscovery" => []
                    ],
                    "TestDiscoveryRequired" => [
                        "name" => "TestDiscoveryRequired",
                        "http" => [
                            "method" => "POST",
                            "requestUri" => "/"
                        ],
                        "input" => ["shape" => "TestDiscoveryRequiredRequest"],
                        "output" => ["shape" => "TestDiscoveryRequiredResponse"],
                        "endpointdiscovery" => ["required" => "true"]
                    ]
                ],
                "shapes" => [
                    "Boolean" => ["type" => "boolean"],
                    "DescribeEndpointsRequest" => [
                        "type" => "structure",
                        "members" => [
                            "Operation" => ["shape" => "String"],
                            "Identifiers" => ["shape" => "Identifiers"]
                        ]
                    ],
                    "DescribeEndpointsResponse" => [
                        "type" => "structure",
                        "required" => ["Endpoints"],
                        "members" => [
                            "Endpoints" => ["shape" => "Endpoints"]
                        ]
                    ],
                    "Endpoint" => [
                        "type" => "structure",
                        "required" => [
                            "Address",
                            "CachePeriodInMinutes"
                        ],
                        "members" => [
                            "Address" => ["shape" => "String"],
                            "CachePeriodInMinutes" => ["shape" => "Long"]
                        ]
                    ],
                    "Endpoints" => [
                        "type" => "list",
                        "member" => ["shape" => "Endpoint"]
                    ],
                    "Identifiers" => [
                        "type" => "map",
                        "key" => ["shape" => "String"],
                        "value" => ["shape" => "String"]
                    ],
                    "Long" => ["type" => "long"],
                    "String" => ["type" => "string"],
                    "TestDiscoveryIdentifiersRequiredRequest" => [
                        "type" => "structure",
                        "required" => ["Sdk"],
                        "members" => [
                            "Sdk" => [
                                "shape" => "String",
                                "endpointdiscoveryid" => true
                            ]
                        ]
                    ],
                    "TestDiscoveryIdentifiersRequiredResponse" => [
                        "type" => "structure",
                        "members" => [
                            "DiscoveredEndpoint" => ["shape" => "Boolean"]
                        ]
                    ],
                    "TestDiscoveryOptionalRequest" => [
                        "type" => "structure",
                        "members" => []
                    ],
                    "TestDiscoveryOptionalResponse" => [
                        "type" => "structure",
                        "members" => [
                            "DiscoveredEndpoint" => ["shape" => "Boolean"]
                        ]
                    ],
                    "TestDiscoveryRequiredRequest" => [
                        "type" => "structure",
                        "members" => []
                    ],
                    "TestDiscoveryRequiredResponse" => [
                        "type" => "structure",
                        "members" => [
                            "DiscoveredEndpoint" => ["shape" => "Boolean"]
                        ]
                    ]
                ]
            ],
            function () { return []; }
        );
    }
}
