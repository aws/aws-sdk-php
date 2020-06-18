<?php

use Aws\Api\Parser\Exception\ParserException;
use Aws\Api\Serializer\RestXmlSerializer;
use Aws\Api\Service;
use Aws\AwsClient;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

/**
 * This class tests the custom functionality of the XmlParser;
 * generic testing is done in ComplianceTest.php
 * @covers \Aws\Api\Parser\RestXmlParser
 * @covers \Aws\Api\Parser\XmlParser
 */
class XmlParserTest extends TestCase
{
    public function timeStampModelProvider(){
        return [
            [932169600, "ParseXmlIso8601", "1999-07-17T00:00:00+00:00"],
            [932169600, "ParseXmlUnix", "1999-07-17T00:00:00+00:00"],
            [932169600, "ParseXmlUnknown", "1999-07-17T00:00:00+00:00"],
            [-10000000, "ParseXmlIso8601", "1969-09-07T06:13:20+00:00"],
            [-10000000, "ParseXmlUnix", "1969-09-07T06:13:20+00:00"],
            [-10000000, "ParseXmlUnknown", "1969-09-07T06:13:20+00:00"],
            ["-10000000", "ParseXmlIso8601", "1969-09-07T06:13:20+00:00"],
            ["-10000000", "ParseXmlUnix", "1969-09-07T06:13:20+00:00"],
            ["-10000000", "ParseXmlUnknown", "1969-09-07T06:13:20+00:00"],
            ["July 17th, 1999", "ParseXmlIso8601", "1999-07-17T00:00:00+00:00"],
            ["July 17th, 1999", "ParseXmlUnix", "1999-07-17T00:00:00+00:00"],
            ["July 17th, 1999", "ParseXmlUnknown", "1999-07-17T00:00:00+00:00"],
            ["1999-07-17T00:00:00", "ParseXmlIso8601", "1999-07-17T00:00:00+00:00"],
            ["1999-07-17T00:00:00", "ParseXmlUnix", "1999-07-17T00:00:00+00:00"],
            ["1999-07-17T00:00:00", "ParseXmlUnknown", "1999-07-17T00:00:00+00:00"],
            ["2002-05-30T09:30:10.5", "ParseXmlIso8601", "2002-05-30T09:30:10+00:00"],
            ["2002-05-30T09:30:10.5", "ParseXmlUnix", "2002-05-30T09:30:10+00:00"],
            ["2002-05-30T09:30:10.5", "ParseXmlUnknown", "2002-05-30T09:30:10+00:00"],
        ];
    }

    public function timeStampExceptionModelProvider(){
        return [
            ["this text is not a date", "ParseXmlIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["this text is not a date", "ParseXmlUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["this text is not a date", "ParseXmlUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["false", "ParseXmlIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["false", "ParseXmlUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["false", "ParseXmlUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["true", "ParseXmlIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["true", "ParseXmlUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["true", "ParseXmlUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["932169600abc", "ParseXmlIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["932169600abc", "ParseXmlUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["932169600abc", "ParseXmlUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [";", "ParseXmlIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [";", "ParseXmlUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [";", "ParseXmlUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["[]", "ParseXmlIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["[]", "ParseXmlUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["[]", "ParseXmlUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [acos(1.01), "ParseXmlIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [acos(1.01), "ParseXmlUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [acos(1.01), "ParseXmlUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [false, "ParseXmlIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [false, "ParseXmlUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [false, "ParseXmlUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [null, "ParseXmlIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [null, "ParseXmlUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [null, "ParseXmlUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
        ];
    }

    /**
     * @dataProvider timeStampModelProvider
     */
    public function testTimeStamps($timestamp, $commandName, $expectedValue)
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
    public function testExceptionTimeStamps($timestamp, $commandName, $expectedException, $expectedMessage)
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
        $xml = new RestXmlSerializer($service, "foo");
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
                        return new FulfilledPromise(new Response(200, [], self::generateXml($args['Timestamp'])));
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
                    "protocol" => "rest-xml",
                    "apiVersion" => "2014-01-01"
                ],
                'shapes' => [
                    "ParseXmlIso8601Response" => [
                        "type" => "structure",
                        "members" => [
                            'Timestamp' => ['shape' => 'Iso8601Timestamp']
                        ],
                        'xmlNamespace' => ['uri' => 'http://cloudfront.amazonaws.com/doc/2017-03-25/', 'prefix'=>""],
                    ],
                    "ParseXmlUnixResponse" => [
                        "type" => "structure",
                        "members" => [
                            'Timestamp' => ['shape' => 'UnixTimestamp']
                        ],
                        'xmlNamespace' => ['uri' => 'http://cloudfront.amazonaws.com/doc/2017-03-25/', 'prefix'=>""],
                    ],
                    "ParseXmlUnknownResponse" => [
                        "type" => "structure",
                        "members" => [
                            'Timestamp' => ['shape' => 'UnknownTimestamp']
                        ],
                        'xmlNamespace' => ['uri' => 'http://cloudfront.amazonaws.com/doc/2017-03-25/', 'prefix'=>""],
                    ],
                    "Iso8601Timestamp" => [
                        "type" => "timestamp",
                        "timestampFormat" => "iso8601",
                    ],
                    "UnixTimestamp" => [
                        "type" => "timestamp",
                        "timestampFormat" => "unixTimestamp",
                    ],
                    "UnknownTimestamp" => [
                        "type" => "timestamp",
                    ],
                ],
                'operations' => [
                    "ParseXmlIso8601" => [
                        "name" => "ParseXmlIso8601",
                        "http" => [
                            "method" => "GET",
                            "requestUri" => "/",
                            "responseCode" => 200
                        ],
                        "output" => [
                            "shape" => "ParseXmlIso8601Response"
                        ]
                    ],
                    "ParseXmlUnix" => [
                        "name" => "ParseXmlUnix",
                        "http" => [
                            "method" => "GET",
                            "requestUri" => "/",
                            "responseCode" => 200
                        ],
                        "output" => [
                            "shape" => "ParseXmlUnixResponse"
                        ]
                    ],
                    "ParseXmlUnknown" => [
                        "name" => "ParseXmlUnknown",
                        "http" => [
                            "method" => "GET",
                            "requestUri" => "/",
                            "responseCode" => 200
                        ],
                        "output" => [
                            "shape" => "ParseXmlUnknownResponse"
                        ]
                    ],
                ],
            ],
            function () { return []; }
        );
    }
    private static function generateXml($timestamp){
        return <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<ParseXmlResponse xmlns="http://s3.amazonaws.com/doc/2006-03-01/">
    <Name>test-xmlParse</Name>
    <Prefix/>
    <Marker/>
    <Timestamp>{$timestamp}</Timestamp>
</ParseXmlResponse>
XML;
    }
}
