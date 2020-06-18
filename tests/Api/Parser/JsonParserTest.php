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
            [932169600, "1999-07-17T00:00:00+00:00"],
            [-10000000, "1969-09-07T06:13:20+00:00"],
            ["-10000000", "1969-09-07T06:13:20+00:00"],
            ["July 17th, 1999", "1999-07-17T00:00:00+00:00"],
            ["1999-07-17T00:00:00", "1999-07-17T00:00:00+00:00"],
            ["2002-05-30T09:30:10.5", "2002-05-30T09:30:10+00:00"],
        ];
    }

    public function timeStampExceptionModelProvider(){
        return [
            ["this text is not a date", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["false", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["true", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["932169600abc", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [[932169600], ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [";", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["[]", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [false, ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["null", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [[], ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [true, ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
        ];
    }

    /**
     * @dataProvider timeStampModelProvider
     */
    public function testHandlesTimeStampsWhenIso8601Expected($timestamp, $expectedValue)
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['Iso8601Timestamp' => $timestamp]);
        $command = $client->getCommand('ParseJson');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $result = $handler($command)->wait()['Iso8601Timestamp']->__toString();
        self::assertEquals($expectedValue, $result);
    }

    /**
     * @dataProvider timeStampModelProvider
     */
    public function testHandlesTimeStampsWhenUnixExpected($timestamp, $expectedValue)
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['UnixTimestamp' => $timestamp]);
        $command = $client->getCommand('ParseJson');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $result = $handler($command)->wait()['UnixTimestamp']->__toString();
        self::assertEquals($expectedValue, $result);
    }

    /**
     * @dataProvider timeStampModelProvider
     */
    public function testHandlesTimeStampsWhenUnknownType($timestamp, $expectedValue)
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['UnknownTimestamp' => $timestamp]);
        $command = $client->getCommand('ParseJson');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $result = $handler($command)->wait()['UnknownTimestamp']->__toString();
        self::assertEquals($expectedValue, $result);
    }

    /**
     * @dataProvider timeStampExceptionModelProvider
     */
    public function testHandlesTimeStampWhenIso8601ExpectedThrowsException($timestamp, $expectedException, $expectedMessage)
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['Iso8601Timestamp' => $timestamp]);
        $command = $client->getCommand('ParseJson');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $this->setExpectedException($expectedException, $expectedMessage);
        $handler($command)->wait();
    }

    /**
     * @dataProvider timeStampExceptionModelProvider
     */
    public function testHandlesTimeStampWhenUnixExpectedThrowsException($timestamp, $expectedException, $expectedMessage)
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['UnixTimestamp' => $timestamp]);
        $command = $client->getCommand('ParseJson');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $this->setExpectedException($expectedException, $expectedMessage);
        $handler($command)->wait();
    }

    /**
     * @dataProvider timeStampExceptionModelProvider
     */
    public function testHandlesTimeStampWhenUnknownTypeThrowsException($timestamp, $expectedException, $expectedMessage)
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['UnknownTimestamp' => $timestamp]);
        $command = $client->getCommand('ParseJson');
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
                    "ParseJsonRequest" => [
                        "type" => "structure",
                        "members" => [
                            "Iso8601Timestamp" => [
                                "shape" => "__timestampIso8601",
                            ],
                            "UnixTimestamp" => [
                                "shape" => "__timestampUnix",
                            ],
                            "UnknownTimestamp" => [
                                "shape" => "__timestampUnknown",
                            ]
                        ]
                    ],
                    "ParseJsonResponse" => [
                        "type" => "structure",
                        "members" => [
                            "Iso8601Timestamp" => [
                                "shape" => "__timestampIso8601",
                            ],
                            "UnixTimestamp" => [
                                "shape" => "__timestampUnix",
                            ],
                            "UnknownTimestamp" => [
                                "shape" => "__timestampUnknown",
                            ]
                        ]
                    ]
                    ,
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
                    ]
                ],
                'operations' => [
                    "ParseJson" => [
                        "name" => "ParseJson",
                        "http" => [
                            "method" => "GET",
                            "requestUri" => "/",
                            "responseCode" => 200
                        ],
                        "output" => [
                            "shape" => "ParseJsonResponse"
                        ]
                    ]

                ],
            ],
            function () { return []; }
        );
    }

}
