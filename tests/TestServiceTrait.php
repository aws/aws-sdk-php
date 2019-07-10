<?php

namespace Aws\Test;

use Aws\Api\Service;
use Aws\AwsClient;

/**
 * Trait TestServiceTrait
 *
 * Used to generate a mock service and client for testing
 *
 * @package Aws\Test
 */
trait TestServiceTrait
{
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
     *
     *
     * @param string $protocol
     * @return Service
     */
    private function generateTestService($protocol)
    {
        return new Service(
            [
                'metadata' => [
                    "protocol" => $protocol,
                    "apiVersion" => "2019-05-01"
                ],
                'shapes' => [
                    "HeaderMap"=> [
                        "type"=> "map",
                        "key"=> [
                            "shape"=> "String"
                        ],
                        "value"=> [
                            "shape"=> "String"
                        ]
                    ],
                    "Integer" => ["type" => "integer"],
                    "String" => ["type" => "string"],
                    "TestException"=>[
                        "type" => "structure",
                        "members" => [
                            "TestString" => ["shape" => "String"],
                            "TestInt" => ["shape" => "Integer"],
                            "TestHeaderMember" => [
                                "shape" => "String",
                                "location" => "header",
                                "locationName" => "TestHeader",
                            ],
                            "TestHeaders" => [
                                "shape" => "HeaderMap",
                                "location" => "headers",
                                "locationName" => "x-meta-",
                            ],
                            "TestStatus" => [
                                "shape" => "Integer",
                                "location" => "statusCode",
                            ],
                        ],
                        "error" => ["httpStatusCode" => 502],
                        "exception" => true,
                    ],
                    "TestInput"=>[
                        "type" => "structure",
                        "members" => [
                            "TestInput" => ["shape" => "String"]
                        ],
                    ],
                ],
                'operations' => [
                    "TestOperation"=> [
                        "name"=> "TestOperation",
                        "http"=> [
                            "method"=> "POST",
                            "requestUri"=> "/",
                            "responseCode"=> 200
                        ],
                        "input" => ["shape"=> "TestInput"],
                        "errors" => [
                            ["shape" => "TestException"]
                        ],
                    ],
                ],
            ],
            function () { return []; }
        );
    }
}