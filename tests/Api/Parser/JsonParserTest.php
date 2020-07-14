<?php

require_once __DIR__ . '/ParserTestServiceTrait.php';

use Aws\Api\Parser\Exception\ParserException;
use PHPUnit\Framework\TestCase;

/**
 * This class tests the custom functionality of the JsonParser;
 * generic testing is done in ComplianceTest.php
 * @covers \Aws\Api\Parser\JsonRpcParser
 * @covers \Aws\Api\Parser\JsonParser
 */
class JsonParserTest extends TestCase
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
            ["-10000000", "ParseUnix", "1969-09-07T06:13:20+00:00"],
            ["-10000000", "ParseIso8601", "1969-09-07T06:13:20+00:00"],
            ["-10000000", "ParseUnknown", "1969-09-07T06:13:20+00:00"],
            ["-10000000.0", "ParseUnix", "1969-09-07T06:13:20+00:00"],
            ["-10000000.0", "ParseIso8601", "1969-09-07T06:13:20+00:00"],
            ["-10000000.0", "ParseUnknown", "1969-09-07T06:13:20+00:00"],
            ["July 17th, 1999", "ParseIso8601", "1999-07-17T00:00:00+00:00"],
            ["July 17th, 1999", "ParseUnix", "1999-07-17T00:00:00+00:00"],
            ["July 17th, 1999", "ParseUnknown", "1999-07-17T00:00:00+00:00"],
            ["1999-07-17T00:00:00", "ParseIso8601", "1999-07-17T00:00:00+00:00"],
            ["1999-07-17T00:00:00", "ParseUnix", "1999-07-17T00:00:00+00:00"],
            ["1999-07-17T00:00:00", "ParseUnknown", "1999-07-17T00:00:00+00:00"],
            ["1999-07-17T00:00:00.5", "ParseIso8601", "1999-07-17T00:00:00+00:00"],
            ["1999-07-17T00:00:00.5", "ParseUnix", "1999-07-17T00:00:00+00:00"],
            ["1999-07-17T00:00:00.5", "ParseUnknown", "1999-07-17T00:00:00+00:00"],
            [[], "ParseIso8601", "1970-01-01T00:00:00+00:00"],
            [[], "ParseUnix", "1970-01-01T00:00:00+00:00"],
            [[], "ParseUnknown", '1970-01-01T00:00:00+00:00'],
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
            [[932169600], "ParseIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [[932169600], "ParseUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [[932169600], "ParseUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [";", "ParseIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [";", "ParseUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [";", "ParseUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["[]", "ParseIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["[]", "ParseUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["[]", "ParseUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["null", "ParseIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["null", "ParseUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            ["null", "ParseUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [true, "ParseIso8601", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [true, "ParseUnix", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
            [true, "ParseUnknown", ParserException::class, "Invalid timestamp value passed to DateTimeResult::fromTimestamp"],
        ];
    }

    /**
     * @dataProvider timeStampModelProvider
     */
    public function testHandlesTimeStamps(
        $timestamp,
        $commandName,
        $expectedValue
    )
    {
        $service = $this->generateTestService('json');
        $client = $this->generateTestClient(
            $service,
            json_encode(['Timestamp' => $timestamp])
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
    public function testTimeStampExceptions(
        $timestamp,
        $commandName,
        $expectedException,
        $expectedMessage
    )
    {
        $service = $this->generateTestService('json');
        $client = $this->generateTestClient(
            $service,
            json_encode(['Timestamp' => $timestamp])
        );
        $command = $client->getCommand($commandName);
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $this->setExpectedException($expectedException, $expectedMessage);
        $handler($command)->wait();
    }
}

