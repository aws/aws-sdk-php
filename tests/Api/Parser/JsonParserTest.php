<?php

use Aws\Api\Parser\Exception\ParserException;
use Aws\Api\Service;
use Aws\AwsClient;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

/*
 * This class tests the PHP specific functionality of the JsonParser;
 * cross-SDK testing is done in ComplianceTest.php
 */

/**
 * @covers \Aws\Api\Parser\JsonRpcParser
 * @covers \Aws\Api\Parser\JsonParser
 */
class JsonParserTest extends TestCase
{
    public function testUnixTimestampReturnedFromService()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['timestamp' => 932169600]);
        $command = $client->getCommand('ParseJson');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $result = $handler($command)->wait()['timestamp']->__toString();

        self::assertEquals("1999-07-17T00:00:00+00:00", $result);
    }
    public function testTextDateReturnedFromService()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['timestamp' => "July 17th, 1999"]);
        $command = $client->getCommand('ParseJson');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $result = $handler($command)->wait()['timestamp']->__toString();
        self::assertEquals("1999-07-17T00:00:00+00:00", $result);
    }

    public function testISOTimestampReturnedFromService()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['timestamp' => "1999-07-17T00:00:00"]);
        $command = $client->getCommand('ParseJson');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $result = $handler($command)->wait()['timestamp']->__toString();
        self::assertEquals("1999-07-17T00:00:00+00:00", $result);
    }

    public function testNegativeNumberReturnedFromService()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['timestamp' => "-10000000"]);
        $command = $client->getCommand('ParseJson');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $result = $handler($command)->wait()['timestamp']->__toString();
        self::assertEquals("1969-09-07T06:13:20+00:00", $result);
    }

    public function testEmptyStringReturnedFromService()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['timestamp' => ""]);
        $command = $client->getCommand('ParseJson');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $this->setExpectedException(ParserException::class);
        $handler($command)->wait()['timestamp']->__toString();
    }

    public function testStringReturnedFromService()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['timestamp' => "this text is not a date"]);
        $command = $client->getCommand('ParseJson');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $this->setExpectedException(ParserException::class);
        $handler($command)->wait()['timestamp']->__toString();
    }

    public function testTrueReturnedFromService()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['timestamp' => true]);
        $command = $client->getCommand('ParseJson');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $this->setExpectedException(ParserException::class);
        $handler($command)->wait()['timestamp']->__toString();
    }

    public function testFalseReturnedFromService()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['timestamp' => false]);
        $command = $client->getCommand('ParseJson');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $this->setExpectedException(ParserException::class);
        $handler($command)->wait()['timestamp']->__toString();
    }

    public function testEmptyArrayReturnedFromService()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['timestamp' => []]);
        $command = $client->getCommand('ParseJson');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $this->setExpectedException(ParserException::class);
        $handler($command)->wait()['timestamp']->__toString();
    }
    public function testEpochArrayReturnedFromService()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['timestamp' => [932169600]]);
        $command = $client->getCommand('ParseJson');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $this->setExpectedException(ParserException::class);
        $handler($command)->wait()['timestamp']->__toString();
    }

    public function testMixedStringReturnedFromService()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['timestamp' => "932169600abc"]);
        $command = $client->getCommand('ParseJson');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $this->setExpectedException(ParserException::class);
        $handler($command)->wait()['timestamp']->__toString();
    }

    public function testDateTimeReturnedFromService()
    {
        $datetime = new DateTime();
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['timestamp' => $datetime]);
        $command = $client->getCommand('ParseJson');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $this->setExpectedException(ParserException::class);
        $handler($command)->wait()['timestamp']->__toString();
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
                            "timestamp" =>[
                                "shape" => "__timestampIso8601",
                            ]
                        ],
                        "required" => [ "timestamp" ]
                    ],
                    "ParseJsonResponse" => [
                        "type" => "structure",
                        "members" => [
                            "timestamp" =>[
                                "shape" => "__timestampIso8601",
                            ]
                        ]
                    ]
                    ,
                    "__timestampIso8601" => [
                        "type" => "timestamp",
                        "timestampFormat" => "iso8601"
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
