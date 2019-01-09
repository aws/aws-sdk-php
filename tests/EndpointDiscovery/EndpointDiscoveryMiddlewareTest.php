<?php

namespace Aws\Test\EndpointDiscovery;

use Aws\Api\Service;
use Aws\AwsClient;
use Aws\Command;
use Aws\CommandInterface;
use Aws\EndpointDiscovery\Configuration;
use Aws\EndpointDiscovery\EndpointDiscoveryMiddleware;
use Aws\Exception\AwsException;
use Aws\Exception\UnresolvedEndpointException;
use Aws\Result;
use Aws\ResultInterface;
use Aws\Sdk;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Uri;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

/**
 * @covers \Aws\EndpointDiscovery\EndpointDiscoveryMiddleware
 */
class EndpointDiscoveryMiddlewareTest extends TestCase
{

    /**
     * @backupStaticAttributes enabled
     * @dataProvider getRequestTestCases
     * @param array $commandArgs
     * @param array $clientArgs
     * @param ResultInterface $describeResult
     * @param RequestInterface $expected
     */
    public function testCorrectlyModifiesRequest(
        array $commandArgs,
        array $clientArgs,
        ResultInterface $describeResult,
        RequestInterface $expected
    ) {
        $client = $this->generateTestClient(
            $this->generateTestService(),
            $clientArgs
        );
        $list = $client->getHandlerList();
        $list->setHandler(function (
            CommandInterface $cmd,
            RequestInterface $req
        ) use ($expected, $describeResult) {
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
        $command = $client->getCommand($commandArgs[0], $commandArgs[1]);
        $client->execute($command);
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
                ['TestDiscoveryOptional', []],
                [
                    'endpoint_discovery' => ['enabled' => false],
                ],
                new Result([]),
                $baseRequest
            ],

            // Discovery optional, enabled by user
            [
                ['TestDiscoveryOptional', []],
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
                ['TestDiscoveryOptional', []],
                [
                ],
                new Result([]),
                $baseRequest,
            ],

            // Discovery required, disabled by user
            [
                ['TestDiscoveryRequired', []],
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
                new Request(
                    'POST',
                    new Uri('https://discovered.com/some/path'),
                    [
                        'User-Agent' => $baseUserAgent . ' endpoint-discovery',
                    ]
                ),
            ],

            // Discovery required, enabled by user
            [
                ['TestDiscoveryRequired', []],
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
                ['TestDiscoveryRequired', []],
                [],
                new Result([
                    'Endpoints' => [
                        [
                            'Address' => 'discovered.com/some/path',
                            'CachePeriodInMinutes' => 10,
                        ],
                    ],
                ]),
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
                ['TestDiscoveryOptional', []],
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
                ['TestDiscoveryRequired', []],
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
                new Request(
                    'POST',
                    new Uri('https://custom.com/custom/path'),
                    [
                        'User-Agent' => $baseUserAgent,
                    ]
                ),
            ],

            // Discovery, endpoint with scheme returned by API (tests parsing)
            [
                ['TestDiscoveryRequired', []],
                [],
                new Result([
                    'Endpoints' => [
                        [
                            'Address' => 'https://discovered.com/some/path',
                            'CachePeriodInMinutes' => 10,
                        ],
                    ],
                ]),
                new Request(
                    'POST',
                    new Uri('https://discovered.com/some/path'),
                    [
                        'User-Agent' => $baseUserAgent . ' endpoint-discovery',
                    ]
                ),
            ],
        ];
    }

    /**
     * @backupStaticAttributes enabled
     * @dataProvider getDiscoveryRequestTestCases
     * @param CommandInterface $mainCmd
     * @param CommandInterface $expectedCmd
     * @param RequestInterface $expectedReq
     */
    public function testCorrectlyConstructsDiscoveryRequest(
        CommandInterface $mainCmd,
        CommandInterface $expectedCmd,
        RequestInterface $expectedReq
    ) {
        $client = $this->generateTestClient($this->generateTestService());
        $list = $client->getHandlerList();
        $list->setHandler(function (
            CommandInterface $cmd,
            RequestInterface $req
        ) use ($expectedCmd, $expectedReq) {
            if ($cmd->getName() === 'DescribeEndpoints') {
                $this->assertEquals($expectedCmd->toArray(), $cmd->toArray());
                $this->assertEquals(
                    $expectedReq->getHeader('x-amz-api-header'),
                    $req->getHeader('x-amz-api-header')
                );
                return $this->generateSingleDescribeResult();
            }
            return $this->generateGenericResult();
        });

        $handler = $list->resolve();
        $handler($mainCmd, new Request('POST', new Uri('https://foo.com')));
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

    /**
     * @backupStaticAttributes enabled
     */
    public function testThrowsExceptionOnUnparsableEndpoint()
    {
        $client = $this->generateTestClient($this->generateTestService());
        $list = $client->getHandlerList();

        $list->setHandler(function (CommandInterface $cmd, RequestInterface $req) {
            if ($cmd->getName() === 'DescribeEndpoints') {
                return Promise\promise_for(new Result([
                    'Endpoints' => [
                        [
                            'Address' => '#!@$',
                            'CachePeriodInMinutes' => 10,
                        ],
                    ],
                ]));
            }
            return $this->generateGenericResult();
        });

        $command = $client->getCommand('TestDiscoveryRequired', []);

        try {
            $client->execute($command);
            $this->fail('Should have failed with an UnresolvedEndpointException.');
        } catch (\Exception $e) {
            $this->assertTrue($e instanceof UnresolvedEndpointException);
            $this->assertEquals(
                "The supplied endpoint '#!@$' is invalid.",
                $e->getMessage()
            );
        }
    }

    /**
     * @backupStaticAttributes enabled
     */
    public function testCachesDiscoveredEndpoints()
    {
        $client = $this->generateTestClient($this->generateTestService());
        $list = $client->getHandlerList();
        $operationCounter = 0;
        $describeCounter = 0;

        $list->setHandler(function (
            CommandInterface $cmd,
            RequestInterface $req
        ) use (&$operationCounter, &$describeCounter) {
            if ($cmd->getName() === 'DescribeEndpoints') {
                $describeCounter++;
                return $this->generateSingleDescribeResult();
            }
            $operationCounter++;
            $this->assertEquals('discovered.com', $req->getUri()->getHost());
            $this->assertEquals('/some/path', $req->getUri()->getPath());
            return $this->generateGenericResult();
        });

        $command = $client->getCommand('TestDiscoveryRequired', []);

        for ($i = 0; $i < 5; $i++) {
            $client->execute($command);
        }

        $this->assertEquals(1, $describeCounter);
        $this->assertEquals(5, $operationCounter);
    }

    /**
     * @backupStaticAttributes enabled
     */
    public function testCachesOnlyUpToCacheLimit()
    {
        $client = $this->generateTestClient(
            $this->generateTestService(),
            [
                'endpoint_discovery' => [
                    'enabled' => true,
                    'cache_limit' => 2
                ]
            ]
        );
        $list = $client->getHandlerList();
        $operationCounter = 0;
        $describeCounter = 0;

        $list->setHandler(function (
            CommandInterface $cmd,
            RequestInterface $req
        ) use (&$operationCounter, &$describeCounter) {
            if ($cmd->getName() === 'DescribeEndpoints') {
                $describeCounter++;
                return Promise\promise_for(new Result([
                    'Endpoints' => [
                        [
                            'Address' => "discovered.com/{$cmd['Identifiers']['Sdk']}",
                            'CachePeriodInMinutes' => 10,
                        ],
                    ],
                ]));
            }
            $operationCounter++;
            $this->assertEquals('discovered.com', $req->getUri()->getHost());
            $this->assertEquals("/{$cmd['Sdk']}", $req->getUri()->getPath());
            return $this->generateGenericResult();
        });

        $commandArgs = [
            ['TestDiscoveryIdentifiersRequired', ['Sdk' => 'one']],
            ['TestDiscoveryIdentifiersRequired', ['Sdk' => 'two']],
            ['TestDiscoveryIdentifiersRequired', ['Sdk' => 'three']],
            ['TestDiscoveryIdentifiersRequired', ['Sdk' => 'three']],
            ['TestDiscoveryIdentifiersRequired', ['Sdk' => 'one']],
            ['TestDiscoveryIdentifiersRequired', ['Sdk' => 'two']],
        ];

        foreach ($commandArgs as $arg) {
            $command = $client->getCommand($arg[0], $arg[1]);
            $client->execute($command);
        }

        // Only the repeated call to 'three' should be cached, so there should
        // be one fewer describe call
        $this->assertEquals(5, $describeCounter);
        $this->assertEquals(6, $operationCounter);
    }

    /**
     * @backupStaticAttributes enabled
     */
    public function testUsesRegionalEndpointOnDescribeFailure()
    {
        $client = $this->generateTestClient(
            $this->generateTestService(),
            [
                'endpoint_discovery' => [
                    'enabled' => true,
                ],
            ]
        );
        $list = $client->getHandlerList();

        $list->setHandler(function (
            CommandInterface $cmd,
            RequestInterface $req
        ) {
            if ($cmd->getName() === 'DescribeEndpoints') {
                return $this->generateDescribeException($cmd);
            }
            $this->assertEquals(
                'awsendpointdiscoverytestservice.us-east-1.amazonaws.com',
                $req->getUri()->getHost()
            );
            return $this->generateGenericResult();
        });

        $command = $client->getCommand('TestDiscoveryOptional', []);
        $client->execute($command);
    }

    /**
     * @backupStaticAttributes enabled
     */
    public function testThrowsExceptionOnDescribeFailure()
    {
        $client = $this->generateTestClient($this->generateTestService());
        $list = $client->getHandlerList();

        $list->setHandler(function (
            CommandInterface $cmd,
            RequestInterface $req
        ) {
            if ($cmd->getName() === 'DescribeEndpoints') {
                return $this->generateDescribeException($cmd);
            }
            return $this->generateGenericResult();
        });

        $command = $client->getCommand('TestDiscoveryRequired', []);
        try {
            $client->execute($command);
            $this->fail('This operation should have failed with an '
                . 'EndpointDiscoveryException.');
        } catch (AwsException $e) {
            $this->assertEquals(
                'EndpointDiscoveryException',
                $e->getAwsErrorCode()
            );
            $this->assertEquals(
                'The endpoint required for this service is currently unable to '
                    . 'be retrieved, and your request can not be fulfilled '
                    . 'unless you manually specify an endpoint.',
                $e->getAwsErrorMessage()
            );
        }
    }

    /**
     * @backupStaticAttributes enabled
     * @dataProvider getInvalidEndpointExceptions
     * @param $exception
     */
    public function testUsesCachedEndpointForInvalidEndpointException($exception)
    {
        $callOrder = [];
        $handler = function (
            CommandInterface $cmd,
            RequestInterface $req
        ) use (&$callOrder, $exception) {
            if ($cmd->getName() === 'DescribeEndpoints') {
                $callOrder[] = 'describe';
                return $this->generateMultiDescribeResults();
            }
            if ($req->getUri()->getHost() == 'discovered.com') {
                $callOrder[] = 'failure';
                return $exception;
            }
            if ($req->getUri()->getHost() == 'discovered2.com') {
                $callOrder[] = 'success';
                return $this->generateGenericResult();
            }
        };

        $client = $this->generateTestClient(
            $this->generateTestService(),
            ['handler' => $handler]
        );
        $command = $client->getCommand('TestDiscoveryRequired', []);

        $client->execute($command);
        $this->assertEquals(['describe', 'failure', 'success'], $callOrder);
    }

    /**
     * @backupStaticAttributes enabled
     * @dataProvider getInvalidEndpointExceptions
     * @param $exception
     */
    public function testUseRegionalEndpointForInvalidEndpointException($exception)
    {
        $callOrder = [];
        $handler = function (
            CommandInterface $cmd,
            RequestInterface $req
        ) use (&$callOrder, $exception) {
            if ($cmd->getName() === 'DescribeEndpoints') {
                $callOrder[] = 'describe';
                return $this->generateMultiDescribeResults();
            }
            if ($cmd->getName() == 'TestDiscoveryOptional'
                && $req->getUri()->getHost() == 'awsendpointdiscoverytestservice.us-east-1.amazonaws.com'
            ) {
                $callOrder[] = 'success';
                return $this->generateGenericResult();
            }
            $callOrder[] = 'failure';
            return $exception;
        };

        $client = $this->generateTestClient(
            $this->generateTestService(),
            [
                'endpoint_discovery' => [
                    'enabled' => true,
                ],
                'handler' => $handler
            ]
        );
        $command = $client->getCommand('TestDiscoveryOptional', []);

        $client->execute($command);
        $this->assertEquals(
            ['describe', 'failure', 'failure', 'success'],
            $callOrder
        );
    }

    /**
     * @backupStaticAttributes enabled
     * @dataProvider getInvalidEndpointExceptions
     * @param $exception
     */
    public function testThrowsExceptionOnInvalidEndpointException($exception)
    {
        $callOrder = [];
        $handler = function (
            CommandInterface $cmd,
            RequestInterface $req
        ) use (&$callOrder, $exception) {
            if ($cmd->getName() === 'DescribeEndpoints') {
                $callOrder[] = 'describe';
                return $this->generateSingleDescribeResult();
            }
            $callOrder[] = 'failure';
            return $exception;
        };
        $client = $this->generateTestClient(
            $this->generateTestService(),
            [
                'endpoint_discovery' => [
                    'enabled' => true,
                ],
                'handler' => $handler
            ]
        );
        $command = $client->getCommand('TestDiscoveryRequired', []);

        try {
            $client->execute($command);
        } catch (AwsException $e) {
            $this->assertEquals(
                'Test invalid endpoint exception',
                $e->getAwsErrorMessage()
            );
        }

        $this->assertEquals(['describe', 'failure'], $callOrder);
    }

    /**
     * @backupStaticAttributes enabled
     * @dataProvider getInvalidEndpointExceptions
     * @param $exception
     */
    public function testCallsDiscoveryApiOnInvalidEndpointException($exception)
    {
        // Use Reflection to set private static discoveryCooldown variable to 0
        // to avoid having to wait for default 60 seconds for testing
        $reflection = new \ReflectionProperty(
            'Aws\EndpointDiscovery\EndpointDiscoveryMiddleware',
            'discoveryCooldown'
        );
        $reflection->setAccessible(true);
        $reflection->setValue(0);
        $callOrder = [];
        $handler = function (
            CommandInterface $cmd,
            RequestInterface $req
        ) use (&$callOrder, $exception, $reflection) {
            if ($cmd->getName() === 'DescribeEndpoints') {
                // On the second trip to DescribeEndpoints, can set discoveryCooldown
                // back to 60, allowing failure to occur naturally on next pass
                if (in_array('describe', $callOrder)) {
                    $reflection->setValue(60);
                }
                $callOrder[] = 'describe';
                return $this->generateSingleDescribeResult();
            }
            $callOrder[] = 'failure';
            return $exception;
        };
        $client = $this->generateTestClient(
            $this->generateTestService(),
            [
                'endpoint_discovery' => [
                    'enabled' => true,
                ],
                'handler' => $handler
            ]
        );
        $command = $client->getCommand('TestDiscoveryRequired', []);

        try {
            $client->execute($command);
        } catch (AwsException $e) {
            $this->assertEquals(
                'Test invalid endpoint exception',
                $e->getAwsErrorMessage()
            );
        }

        // Discovery API should have been called twice, once at beginning,
        // and once when discoveryCooldown was set to 0
        $this->assertEquals(
            ['describe', 'failure', 'describe', 'failure'],
            $callOrder
        );
    }

    /**
     * Data provider for exceptions treated as invalid endpoint exceptions
     *
     * @return array
     */
    public function getInvalidEndpointExceptions()
    {
        return [
            [$this->generateInvalidEndpointException()],
            [$this->generate421Exception()],
        ];
    }

    /**
     * @backupStaticAttributes enabled
     */
    public function testThrowsExceptionWhenMarkedAsEndpointOperation()
    {
        $client = $this->generateTestClient($this->generateTestService());
        $command = $client->getCommand('TestContradictoryOperation', []);
        $middleware = EndpointDiscoveryMiddleware::wrap(
            $client,
            [],
            new Configuration(true)
        );

        $list = $client->getHandlerList();
        $list->appendBuild($middleware);
        $handler = $list->resolve();
        try {
            $handler($command, new Request('POST', 'https://foo.com'));
            $this->fail('This operation should have failed with a '
                . 'UnresolvedEndpointException!');
        } catch (\Exception $e) {
            $this->assertEquals(
                'This operation is contradictorily marked both as using endpoint '
                    . 'discovery and being the endpoint discovery operation. '
                    . 'Please verify the accuracy of your model files.',
                $e->getMessage()
            );
            $this->assertInstanceOf(UnresolvedEndpointException::class, $e);
        }
    }

    /**
     * @backupStaticAttributes enabled
     */
    public function testThrowsExceptionOnBadDiscoveryData()
    {
        $client = $this->generateTestClient($this->generateTestService());
        $list = $client->getHandlerList();

        $list->setHandler(function (CommandInterface $cmd, RequestInterface $req) {
            return $this->generateGenericResult();
        });

        $command = $client->getCommand('TestDiscoveryRequired', []);
        try {
            $client->execute($command);
            $this->fail('This operation should have failed with an '
                . 'UnresolvedEndpointException.');
        } catch (AwsException $e) {
            $this->assertEquals(
                'The endpoint required for this service is currently unable to '
                    . 'be retrieved, and your request can not be fulfilled '
                    . 'unless you manually specify an endpoint.',
                $e->getAwsErrorMessage()
            );
            $previous = $e->getPrevious();
            $this->assertTrue($previous instanceof UnresolvedEndpointException);
            $this->assertEquals(
                'The endpoint discovery operation yielded a response that did '
                    . 'not contain properly formatted endpoint data.',
                $previous->getMessage()
            );
        }
    }

    /**
     * @backupStaticAttributes enabled
     */
    public function testThrowsExceptionForBadModel()
    {
        $client = $this->generateTestClient($this->generateFaultyService());
        $list = $client->getHandlerList();

        $list->setHandler(function (CommandInterface $cmd, RequestInterface $req) {
            return $this->generateGenericResult();
        });

        $command = $client->getCommand('TestDiscoveryRequired', []);
        try {
            $client->execute($command);
            $this->fail('This operation should have failed with an '
                . 'UnresolvedEndpointException.');
        } catch (AwsException $e) {
            $this->assertEquals(
                'The endpoint required for this service is currently unable to '
                    . 'be retrieved, and your request can not be fulfilled '
                    . 'unless you manually specify an endpoint.',
                $e->getAwsErrorMessage()
            );
            $previous = $e->getPrevious();
            $this->assertTrue($previous instanceof UnresolvedEndpointException);
            $this->assertEquals(
                'This command is set to use endpoint discovery, but no endpoint '
                    . 'discovery operation was found. Please verify the '
                    . 'accuracy of your model files.',
                $previous->getMessage()
            );
        }
    }

    private function generateDescribeException(CommandInterface $cmd)
    {
        return Promise\rejection_for(new AwsException(
           'Test describe endpoints exception',
           $cmd
        ));
    }

    private function generateGenericResult()
    {
        return Promise\promise_for(new Result([]));
    }

    private function generateInvalidEndpointException()
    {
        $message = 'Test invalid endpoint exception';
        return Promise\rejection_for(new AwsException(
            $message,
            new Command('', []),
            [
                'code' => 'InvalidEndpointException',
                'message' => $message
            ]
        ));
    }

    private function generate421Exception()
    {
        $message = 'Test invalid endpoint exception';
        return Promise\rejection_for(new AwsException(
            $message,
            new Command('', []),
            [
                'code' => 'Test421Exception',
                'response' => new Response(421),
                'message' => $message
            ]
        ));
    }

    private function generateMultiDescribeResults()
    {
        return Promise\promise_for(new Result([
            'Endpoints' => [
                [
                    'Address' => "discovered.com/some/path",
                    'CachePeriodInMinutes' => 10,
                ],
                [
                    'Address' => 'discovered2.com/some/path',
                    'CachePeriodInMinutes' => 10,
                ],
            ],
        ]));
    }

    private function generateSingleDescribeResult()
    {
        return Promise\promise_for(new Result([
            'Endpoints' => [
                [
                    'Address' => 'discovered.com/some/path',
                    'CachePeriodInMinutes' => 10,
                ],
            ],
        ]));
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

    /**
     * Returns an endpoint discovery test service
     *
     * @return Service
     */
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
            function () {
                return [];
            }
        );
    }

    /**
     * Returns an endpoint discovery service without a discovery API
     *
     * @return Service
     */
    private function generateFaultyService()
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
            function () {
                return [];
            }
        );
    }
}
