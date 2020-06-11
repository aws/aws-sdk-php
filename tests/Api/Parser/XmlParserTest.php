<?php

use Aws\Api\Parser\Exception\ParserException;
use Aws\Api\Serializer\RestXmlSerializer;
use Aws\Api\Service;
use Aws\AwsClient;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

/*
 * This class tests the PHP specific functionality of the XmlParser;
 * cross-SDK testing is done in ComplianceTest.php
 */

/**
 * @covers \Aws\Api\Parser\RestXmlParser
 * @covers \Aws\Api\Parser\XmlParser
 */
class XmlParserTest extends TestCase
{

    public function testUnixTimestampReturnedFromGetDomainName()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['timestamp' => 932169600]);
        $command = $client->getCommand('ParseXml');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $result = $handler($command)->wait()['timestamp']->__toString();

        self::assertEquals("1999-07-17T00:00:00+00:00", $result);
    }
    public function testTextDateReturnedFromGetDomainName()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['timestamp' => "July 17th, 1999"]);
        $command = $client->getCommand('ParseXml');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $result = $handler($command)->wait()['timestamp']->__toString();
        self::assertEquals("1999-07-17T00:00:00+00:00", $result);
    }

    public function testISOTimestampReturnedFromGetDomainName()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['timestamp' => "1999-07-17T00:00:00"]);
        $command = $client->getCommand('ParseXml');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $result = $handler($command)->wait()['timestamp']->__toString();
        self::assertEquals("1999-07-17T00:00:00+00:00", $result);
    }

    public function testNegativeNumberReturnedFromGetDomainName()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['timestamp' => -10000000]);
        $command = $client->getCommand('ParseXml');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $result = $handler($command)->wait()['timestamp']->__toString();
        self::assertEquals("1969-09-07T06:13:20+00:00", $result);
    }

    public function testDateTimeReturnedFromGetDomainName()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['timestamp' => "2002-05-30T09:30:10.5"]);
        $command = $client->getCommand('ParseXml');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $result = $handler($command)->wait()['timestamp']->__toString();
        self::assertEquals("2002-05-30T09:30:10+00:00", $result);
    }


    public function testEmptyStringReturnedFromGetDomainName()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['timestamp' => ""]);
        $command = $client->getCommand('ParseXml');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $this->setExpectedException(ParserException::class);
        $handler($command)->wait()['timestamp']->__toString();
    }

    public function testStringReturnedFromGetDomainName()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['timestamp' => "this text is not a date"]);
        $command = $client->getCommand('ParseXml');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $this->setExpectedException(ParserException::class);
        $handler($command)->wait()['timestamp']->__toString();
    }

    public function testFalseReturnedFromGetDomainName()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['timestamp' => false]);
        $command = $client->getCommand('ParseXml');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $this->setExpectedException(ParserException::class);
        $handler($command)->wait()['timestamp']->__toString();
    }

    public function testFalseStringReturnedFromGetDomainName()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['timestamp' => "false"]);
        $command = $client->getCommand('ParseXml');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $this->setExpectedException(ParserException::class);
        $handler($command)->wait()['timestamp']->__toString();
    }

    public function testTrueStringReturnedFromGetDomainName()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['timestamp' => "true"]);
        $command = $client->getCommand('ParseXml');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $this->setExpectedException(ParserException::class);
        $handler($command)->wait()['timestamp']->__toString();
    }

    public function testMixedStringReturnedFromGetDomainName()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['timestamp' => "932169600abc"]);
        $command = $client->getCommand('ParseXml');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $this->setExpectedException(ParserException::class);
        $handler($command)->wait()['timestamp']->__toString();
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
                        return new FulfilledPromise(new Response(200, [], self::generateXml($args['timestamp'])));
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
                    "ParseXmlRequest" => [
                        "type" => "structure",
                        "members" => [
                            "timestamp" =>[
                                "shape" => "__timestampIso8601",
                                "locationName" => "timestamp",
                                'xmlNamespace' => ['uri' => 'http://cloudfront.amazonaws.com/doc/2017-03-25/']
                            ],
                        ],
                        "required" => [ "timestamp" ]
                    ],
                    "ParseXmlResponse" => [
                        "type" => "structure",
                        "members" => [
                            'timestamp' => ['shape' => 'timestamp']
                        ],
                        'xmlNamespace' => ['uri' => 'http://cloudfront.amazonaws.com/doc/2017-03-25/', 'prefix'=>""],
                    ]
                    ,
                    "timestamp" => [
                        "type" => "timestamp",
                        "timestampFormat" => "iso8601",
                    ]
                ],
                'operations' => [
                    "ParseXml" => [
                        "name" => "ParseXml",
                        "http" => [
                            "method" => "GET",
                            "requestUri" => "/",
                            "responseCode" => 200
                        ],
                        "output" => [
                            "shape" => "ParseXmlResponse"
                        ]
                    ]

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
    <timestamp>{$timestamp}</timestamp>
</ParseXmlResponse>
XML;
    }
}
