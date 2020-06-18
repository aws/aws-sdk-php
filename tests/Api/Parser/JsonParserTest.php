<?php

use Aws\Api\Parser\Exception\ParserException;
use Aws\Api\Service;
use Aws\AwsClient;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

/**
 * This class tests the custom functionality of the JsonParser;
 * generic testing is done in ComplianceTest.php
 * @covers \Aws\Api\Parser\JsonRpcParser
 * @covers \Aws\Api\Parser\JsonParser
 */
class JsonParserTest extends TestCase
{

    public function timeStampModelProvider(){
        return [
            [932169600, "ParseJsonIso8601", "1999-07-17T00:00:00+00:00"],
            [932169600, "ParseJsonUnix", "1999-07-17T00:00:00+00:00"],
            [932169600, "ParseJsonUnknown", "1999-07-17T00:00:00+00:00"],
            [-10000000, "ParseJsonIso8601", "1969-09-07T06:13:20+00:00"],
            [-10000000, "ParseJsonUnix", "1969-09-07T06:13:20+00:00"],
            [-10000000, "ParseJsonUnknown", "1969-09-07T06:13:20+00:00"],
            ["-10000000", "ParseJsonUnix", "1969-09-07T06:13:20+00:00"],
            ["-10000000", "ParseJsonIso8601", "1969-09-07T06:13:20+00:00"],
            ["-10000000", "ParseJsonUnknown", "1969-09-07T06:13:20+00:00"],
            ["July 17th, 1999", "ParseJsonIso8601", "1999-07-17T00:00:00+00:00"],
            ["July 17th, 1999", "ParseJsonUnix", "1999-07-17T00:00:00+00:00"],
            ["July 17th, 1999", "ParseJsonUnknown", "1999-07-17T00:00:00+00:00"],
            ["1999-07-17T00:00:00", "ParseJsonIso8601", "1999-07-17T00:00:00+00:00"],
            ["1999-07-17T00:00:00", "ParseJsonUnix", "1999-07-17T00:00:00+00:00"],
            ["1999-07-17T00:00:00", "ParseJsonUnknown", "1999-07-17T00:00:00+00:00"],
            ["1999-07-17T00:00:00.5", "ParseJsonIso8601", "1999-07-17T00:00:00+00:00"],
            ["1999-07-17T00:00:00.5", "ParseJsonUnix", "1999-07-17T00:00:00+00:00"],
            ["1999-07-17T00:00:00.5", "ParseJsonUnknown", "1999-07-17T00:00:00+00:00"],
        ];
    }

    public function timeStampExceptionModelProvider(){
        return [
            ["this text is not a date", "ParseJsonIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["this text is not a date", "ParseJsonUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["this text is not a date", "ParseJsonUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["false", "ParseJsonIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["false", "ParseJsonUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["false", "ParseJsonUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["true", "ParseJsonIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["true", "ParseJsonUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["true", "ParseJsonUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["932169600abc", "ParseJsonIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["932169600abc", "ParseJsonUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["932169600abc", "ParseJsonUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [[932169600], "ParseJsonIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [[932169600], "ParseJsonUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [[932169600], "ParseJsonUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [";", "ParseJsonIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [";", "ParseJsonUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [";", "ParseJsonUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["[]", "ParseJsonIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["[]", "ParseJsonUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["[]", "ParseJsonUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [false, "ParseJsonIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [false, "ParseJsonUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [false, "ParseJsonUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["null", "ParseJsonIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["null", "ParseJsonUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["null", "ParseJsonUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [[], "ParseJsonIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [[], "ParseJsonUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [[], "ParseJsonUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [true, "ParseJsonIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [true, "ParseJsonUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [true, "ParseJsonUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
       ];
    }

    /**
     * @dataProvider timeStampModelProvider
     */
    public function testHandlesTimeStampsWhenIso8601Expected($timestamp, $commandName, $expectedValue)
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['Timestamp' => $timestamp]);
        $command = $client->getCommand($commandName);
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $result = $handler($command)->wait()['Timestamp']->__toString();
        self::assertEquals($expectedValue, $result);
    }

    /**
     * @dataProvider timeStampExceptionModelProvider
     */
    public function testTimeStampExceptions($timestamp, $commandName, $expectedException, $expectedMessage)
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['Timestamp' => $timestamp]);
        $command = $client->getCommand($commandName);
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $this->setExpectedException($expectedException, $expectedMessage);
        $handler($command)->wait();
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
                    'validate' => false,
                    'region'       => 'us-east-1',
                    'version'      => 'latest',
                    'http_handler' => function () use ($args) {
                        return new FulfilledPromise(new Response(200, [], json_encode($args)));
                    }
                ],
                $args
            )
        );
    }

    private function generateTestService()
    {
        return new Service(
            [
                'metadata' => [
                    "protocol" => "json",
                    "apiVersion" => "2014-01-01"
                ],
                'shapes' => [
                    "ParseJsonIso8601Response" => [
                        "type" => "structure",
                        "members" => [
                            "Timestamp" =>[
                                "shape" => "__timestampIso8601",
                            ]
                        ]
                    ],
                    "ParseJsonUnixResponse" => [
                        "type" => "structure",
                        "members" => [
                            "Timestamp" =>[
                                "shape" => "__timestampUnix",
                            ]
                        ]
                    ],
                    "ParseJsonUnknownResponse" => [
                        "type" => "structure",
                        "members" => [
                            "Timestamp" =>[
                                "shape" => "__timestampUnknown",
                            ]
                        ]
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
                    "ParseJsonIso8601" => [
                        "name" => "ParseJsonIso8601",
                        "http" => [
                            "method" => "GET",
                            "requestUri" => "/",
                            "responseCode" => 200
                        ],
                        "output" => [
                            "shape" => "ParseJsonIso8601Response"
                        ]
                    ],
                    "ParseJsonUnix" => [
                        "name" => "ParseJsonUnix",
                        "http" => [
                            "method" => "GET",
                            "requestUri" => "/",
                            "responseCode" => 200
                        ],
                        "output" => [
                            "shape" => "ParseJsonUnixResponse"
                        ]
                    ],
                    "ParseJsonUnknown" => [
                        "name" => "ParseJsonUnknown",
                        "http" => [
                            "method" => "GET",
                            "requestUri" => "/",
                            "responseCode" => 200
                        ],
                        "output" => [
                            "shape" => "ParseJsonUnknownResponse"
                        ]
                    ],
                ],
            ],
            function () { return []; }
        );
    }

}
