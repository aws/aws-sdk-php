<?php
namespace Aws\Test\Api\Parser;

use Aws\Api\Service;
use Aws\AwsClient;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Psr7\Response;

/**
 * @internal
 */
trait ParserTestServiceTrait
{

    /**
     * Creates a service for the test
     *
     * @param Service $service
     * @param $content
     *
     * @return AwsClient
     */
    private function generateTestClient(Service $service, $content)
    {
        return new AwsClient(
            array_merge(
                [
                    'service' => 'foo',
                    'api_provider' => function () use ($service) {
                        return $service->toArray();
                    },
                    'region' => 'us-east-1',
                    'version' => 'latest',
                    'http_handler' => function () use ($content) {
                        return new FulfilledPromise(new Response(200, [], $content));
                    }
                ]
            )
        );
    }

    /**
     * Creates a service for the test
     *
     * @param string $protocol
     *
     * @return Service
     */
    private function generateTestService($protocol)
    {
        $metadata = [
            "protocol" => "{$protocol}",
            "apiVersion" => "2014-01-01"
        ];
        if ($protocol === 'json') {
            $metadata['jsonVersion'] = "1.1";
        }

        return new Service(
            [
                'metadata' => $metadata,
                'shapes' => [
                    "ParseIso8601Response" => [
                        "type" => "structure",
                        "members" => [
                            "Timestamp" => [
                                "shape" => "__timestampIso8601",
                            ]
                        ]
                    ],
                    "ParseDocTypeResponse" => [
                        "type" => "structure",
                        "members" => [
                            "DocumentValue" => [
                                "shape" => "DocumentType",
                            ]
                        ]
                    ],
                    "ParseUnixResponse" => [
                        "type" => "structure",
                        "members" => [
                            "Timestamp" => [
                                "shape" => "__timestampUnix",
                            ]
                        ]
                    ],
                    "ParseUnknownResponse" => [
                        "type" => "structure",
                        "members" => [
                            "Timestamp" => [
                                "shape" => "__timestampUnknown",
                            ]
                        ]
                    ],
                    "DocumentType" => [
                        "type" => "structure",
                        "document" => true
                    ],
                    "__timestampIso8601" => [
                        "type" => "timestamp",
                        "timestampFormat" => "iso8601"
                    ],
                    "__timestampUnix" => [
                        "type" => "timestamp",
                        "timestampFormat" => "unixTimestamp"
                    ],
                    "__timestampUnknown" => [
                        "type" => "timestamp",
                    ],
                ],
                'operations' => [
                    "ParseDocType" => [
                        "name" => "ParseDocType",
                        "http" => [
                            "method" => "GET",
                            "requestUri" => "/",
                            "responseCode" => 200
                        ],
                        "output" => [
                            "shape" => "ParseDocTypeResponse"
                        ]
                    ],
                    "ParseIso8601" => [
                        "name" => "ParseIso8601",
                        "http" => [
                            "method" => "GET",
                            "requestUri" => "/",
                            "responseCode" => 200
                        ],
                        "output" => [
                            "shape" => "ParseIso8601Response"
                        ]
                    ],
                    "ParseUnix" => [
                        "name" => "ParseUnix",
                        "http" => [
                            "method" => "GET",
                            "requestUri" => "/",
                            "responseCode" => 200
                        ],
                        "output" => [
                            "shape" => "ParseUnixResponse"
                        ]
                    ],
                    "ParseUnknown" => [
                        "name" => "ParseUnknown",
                        "http" => [
                            "method" => "GET",
                            "requestUri" => "/",
                            "responseCode" => 200
                        ],
                        "output" => [
                            "shape" => "ParseUnknownResponse"
                        ],
                    ],
                ],
            ],
            function () {
                return [];
            }
        );
    }
}
