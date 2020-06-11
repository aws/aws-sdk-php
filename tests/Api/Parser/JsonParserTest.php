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
    static $timestampFormats = ['iso8601', 'unixTimestamp'];
    public function timeStampModelProvider(){
        return [
            [932169600, "1999-07-17T00:00:00+00:00", null, null],
            [-10000000, "1969-09-07T06:13:20+00:00", null, null],
            ["-10000000", "1969-09-07T06:13:20+00:00", null, null],
            ["July 17th, 1999", "1999-07-17T00:00:00+00:00", null, null],
            ["1999-07-17T00:00:00", "1999-07-17T00:00:00+00:00", null, null],
            ["2002-05-30T09:30:10.5", "2002-05-30T09:30:10+00:00", null, null],
            ["this text is not a date", null, ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["false", null, ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["true", null, ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["932169600abc", null, ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [[932169600], null, ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [";", null, ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["[]", null, ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [false, null, ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["null", null, ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [[], null, ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [true, null, ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
        ];
    }

    /**
     * @dataProvider timeStampModelProvider
     */
    public function testTimeStamps($timestamp, $expectedValue, $expectedException, $expectedMessage)
    {
        foreach (self::$timestampFormats as $expectedFormat) {
            $service = $this->generateTestService($expectedFormat);
            $client = $this->generateTestClient($service, ['Timestamp' => $timestamp]);
            $command = $client->getCommand('ParseJson');
            $list = $client->getHandlerList();
            $handler = $list->resolve();
            if (!empty($expectedValue)) {
                $result = $handler($command)->wait()['Timestamp']->__toString();
                self::assertEquals($expectedValue, $result);
            } else {
                $this->setExpectedException($expectedException, $expectedMessage);
                $handler($command)->wait();
            }
        }
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
                    'http_handler' => function () use ($args) {
                        return new FulfilledPromise(new Response(200, [], json_encode($args)));
                    }
                ],
                $args
            )
        );
    }

    private function generateTestService($expectedFormat)
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
                            "Timestamp" =>[
                                "shape" => "__timestampIso8601",
                            ]
                        ],
                        "required" => [ "timestamp" ]
                    ],
                    "ParseJsonResponse" => [
                        "type" => "structure",
                        "members" => [
                            "Timestamp" =>[
                                "shape" => "__timestampIso8601",
                            ]
                        ]
                    ]
                    ,
                    "__timestampIso8601" => [
                        "type" => "timestamp",
                        "timestampFormat" => "{$expectedFormat}"
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
