<?php

namespace Aws\Test\ClientSideMonitoring;

use Aws\Api\Service;
use Aws\AwsClient;
use Aws\Credentials\CredentialProvider;
use Aws\Credentials\Credentials;
use Aws\EndpointDiscovery\Configuration;
use Aws\EndpointDiscovery\EndpointDiscoveryMiddleware;
use Aws\Exception\UnresolvedEndpointException;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\EndpointDiscovery\EndpointDiscoveryMiddleware
 */
class EndpointDiscoveryMiddlewareTest extends TestCase
{

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
