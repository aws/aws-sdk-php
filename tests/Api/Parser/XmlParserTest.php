<?php

require_once __DIR__ . '/ParserTestServiceTrait.php';

use Aws\Api\Parser\Exception\ParserException;
use PHPUnit\Framework\TestCase;

;

/**
 * This class tests the custom functionality of the XmlParser;
 * generic testing is done in ComplianceTest.php
 * @covers \Aws\Api\Parser\RestXmlParser
 * @covers \Aws\Api\Parser\XmlParser
 */
class XmlParserTest extends TestCase
{
    use ParserTestServiceTrait;

    public function timeStampModelProvider()
    {
        return [
            [932169600, "ParseIso8601", "1999-07-17T00:00:00+00:00"],
            [932169600, "ParseUnix", "1999-07-17T00:00:00+00:00"],
            [932169600, "ParseUnknown", "1999-07-17T00:00:00+00:00"],
            [-10000000, "ParseIso8601", "1969-09-07T06:13:20+00:00"],
            [-10000000, "ParseUnix", "1969-09-07T06:13:20+00:00"],
            [-10000000, "ParseUnknown", "1969-09-07T06:13:20+00:00"],
            ["-10000000", "ParseIso8601", "1969-09-07T06:13:20+00:00"],
            ["-10000000", "ParseUnix", "1969-09-07T06:13:20+00:00"],
            ["-10000000", "ParseUnknown", "1969-09-07T06:13:20+00:00"],
            ["-10000000.0", "ParseIso8601", "1969-09-07T06:13:20+00:00"],
            ["-10000000.0", "ParseUnix", "1969-09-07T06:13:20+00:00"],
            ["-10000000.0", "ParseUnknown", "1969-09-07T06:13:20+00:00"],
            ["July 17th, 1999", "ParseIso8601", "1999-07-17T00:00:00+00:00"],
            ["July 17th, 1999", "ParseUnix", "1999-07-17T00:00:00+00:00"],
            ["July 17th, 1999", "ParseUnknown", "1999-07-17T00:00:00+00:00"],
            ["1999-07-17T00:00:00", "ParseIso8601", "1999-07-17T00:00:00+00:00"],
            ["1999-07-17T00:00:00", "ParseUnix", "1999-07-17T00:00:00+00:00"],
            ["1999-07-17T00:00:00", "ParseUnknown", "1999-07-17T00:00:00+00:00"],
            ["2002-05-30T09:30:10.5", "ParseIso8601", "2002-05-30T09:30:10+00:00"],
            ["2002-05-30T09:30:10.5", "ParseUnix", "2002-05-30T09:30:10+00:00"],
            ["2002-05-30T09:30:10.5", "ParseUnknown", "2002-05-30T09:30:10+00:00"],
            [null, "ParseIso8601", "1970-01-01T00:00:00+00:00"],
            [null, "ParseUnix", "1970-01-01T00:00:00+00:00"],
            [null, "ParseUnknown", '1970-01-01T00:00:00+00:00'],
            [false, "ParseIso8601", "1970-01-01T00:00:00+00:00"],
            [false, "ParseUnix", "1970-01-01T00:00:00+00:00"],
            [false, "ParseUnknown", '1970-01-01T00:00:00+00:00'],
            [(float) 0, "ParseIso8601", "1970-01-01T00:00:00+00:00"],
            [(float) 0, "ParseUnix", "1970-01-01T00:00:00+00:00"],
            [(float) 0, "ParseUnknown", '1970-01-01T00:00:00+00:00'],
        ];
    }

    public function timeStampExceptionModelProvider()
    {
        return [
            ["this text is not a date", "ParseIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["this text is not a date", "ParseUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["this text is not a date", "ParseUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["false", "ParseIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["false", "ParseUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["false", "ParseUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["true", "ParseIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["true", "ParseUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["true", "ParseUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["932169600abc", "ParseIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["932169600abc", "ParseUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["932169600abc", "ParseUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [";", "ParseIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [";", "ParseUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [";", "ParseUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["[]", "ParseIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["[]", "ParseUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["[]", "ParseUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [acos(1.01), "ParseIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [acos(1.01), "ParseUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [acos(1.01), "ParseUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
        ];
    }

    /**
     * @dataProvider timeStampModelProvider
     */
    public function testTimeStamps($timestamp, $commandName, $expectedValue)
    {
        $service = $this->generateTestService('rest-xml');
        $client = $this->generateTestClient(
            $service,
            self::generateXml(['Timestamp' => $timestamp]['Timestamp']),
            ['Timestamp' => $timestamp]
        );
        $command = $client->getCommand($commandName);
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $result = $handler($command)->wait()['Timestamp']->__toString();
        self::assertEquals($expectedValue, $result);
    }


    /**
     * @dataProvider timeStampExceptionModelProvider
     */
    public function testExceptionTimeStamps(
        $timestamp,
        $commandName,
        $expectedException,
        $expectedMessage
    )
    {
        $service = $this->generateTestService('rest-xml');
        $client = $this->generateTestClient(
            $service,
            self::generateXml($timestamp),
            ['Timestamp' => $timestamp]
        );
        $command = $client->getCommand($commandName);
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $this->setExpectedException($expectedException, $expectedMessage);
        $handler($command)->wait();
    }

    private static function generateXml($timestamp)
    {
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
