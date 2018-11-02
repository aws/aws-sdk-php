<?php
namespace Aws\Test;

use Aws\AwsClient;
use Aws\EndpointParameterMiddleware;
use Aws\HandlerList;
use Aws\Api\Service;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\EndpointParameterMiddleware
 */
class EndpointParameterMiddlewareTest extends TestCase
{
    use UsesServiceTrait;

    /**
     * @dataProvider getTestCases
     */
    public function testCorrectlyOutputsHost(
        Service $service,
        $cmdName,
        $params,
        $endpoint,
        $expectedHost
    ) {
        $client = new AwsClient([
            'service'      => 'foo',
            'api_provider' => function () use ($service) {
                return $service->toArray();
            },
            'region'       => 'us-east-1',
            'version'      => 'latest',
        ]);
        $command = $client->getCommand($cmdName, $params);

        $list = new HandlerList();
        $list->setHandler(function ($command, $request) use ($expectedHost) {
            $this->assertEquals(
                $expectedHost,
                $request->getUri()->getHost()
            );
        });

        $list->appendBuild(EndpointParameterMiddleware::wrap($service));

        $handler = $list->resolve();
        $handler($command, new Request('POST', $endpoint));
    }

    public function getTestCases()
    {
        $service = new Service(
            [
                'metadata' => [
                    "protocol" => "json",
                    "apiVersion" => "2014-01-01"
                ],
                'shapes' => [
                    "StaticInputShape" => [
                        "type" => "structure",
                        "members" => [
                            "StaticParameter" => [
                                "shape" => "StringType"
                            ],
                        ],
                    ],
                    "MemberRefInputShape"=> [
                        "type"=> "structure",
                        "members"=> [
                            "HostParameter"=> [
                                "shape"=> "StringType",
                                "location"=> "host"
                            ],
                        ],
                    ],
                    "MultiRefInputShape"=> [
                        "type"=> "structure",
                        "members"=> [
                            "HostParameter"=> [
                                "shape"=> "StringType",
                                "location"=> "host"
                            ],
                            "HostParameter2"=> [
                                "shape"=> "StringType",
                                "location"=> "host"
                            ],
                        ],
                    ],
                    "StringType"=> [
                        "type"=> "string"
                    ],
                ],
                'operations' => [
                    "NoEndpointOp"=> [
                        "name"=> "NoEndpointOp",
                        "http"=> [
                            "method"=> "POST",
                            "requestUri"=> "/",
                            "responseCode"=> 200
                        ],
                        "input"=> ["shape"=> "StaticInputShape"],
                    ],
                    "StaticOp"=> [
                        "name"=> "StaticOp",
                        "http"=> [
                            "method"=> "POST",
                            "requestUri"=> "/",
                            "responseCode"=> 200
                        ],
                        "endpoint"=> [
                            "host"=> "static.{@}"
                        ],
                        "input"=> ["shape"=> "StaticInputShape"],
                    ],
                    "MemberRefOp" => [
                        "name"=> "MemberRefOp",
                        "http"=> [
                            "method"=> "POST",
                            "requestUri"=> "/",
                            "responseCode"=> 200
                        ],
                        "endpoint"=> [
                            "host"=> "{HostParameter}.{@}"
                        ],
                        "input"=> ["shape"=> "MemberRefInputShape"],
                    ],
                    "MultiRefOp" => [
                        "name"=> "MultiRefOp",
                        "http"=> [
                            "method"=> "POST",
                            "requestUri"=> "/",
                            "responseCode"=> 200
                        ],
                        "endpoint"=> [
                            "host"=> "{HostParameter}.{HostParameter2}.{@}"
                        ],
                        "input"=> ["shape"=> "MemberRefInputShape"],
                    ],
                ],
            ],
            function () { return []; }
        );

        return [
            [
                $service,
                'NoEndpointOp',
                [
                    'StaticParameter' => 'bar-static',
                ],
                'https://foo.com',
                'foo.com',
            ],
            [
                $service,
                'StaticOp',
                [
                    'StaticParameter' => 'bar-static',
                ],
                'https://foo.com',
                'static.foo.com',
            ],
            [
                $service,
                'MemberRefOp',
                [
                    'HostParameter' => 'bar-host',
                ],
                'https://foo.com',
                'bar-host.foo.com',
            ],
            [
                $service,
                'MultiRefOp',
                [
                    'HostParameter' => 'bar-host',
                    'HostParameter2' => 'baz-host',
                ],
                'https://foo.com',
                'bar-host.baz-host.foo.com',
            ],
        ];
    }
}
