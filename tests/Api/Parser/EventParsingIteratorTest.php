<?php

namespace Aws\Test\Api\Parser;

use Aws\Api\Parser\EventParsingIterator;
use Aws\Api\Parser\Exception\ParserException;
use Aws\Api\Parser\RestXmlParser;
use Aws\Api\Service;
use Aws\Api\ShapeMap;
use Aws\Api\StructureShape;
use Aws\Exception\EventStreamDataException;
use GuzzleHttp\Psr7;
use Psr\Http\Message\StreamInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\Api\Parser\EventParsingIterator
 */
class EventParsingIteratorTest extends TestCase
{
    /** @var array */
    private static $successEventNames = [
        'end_event',
        'headers_event',
        'records_event',
        'stats_event'
    ];

    /** @var StructureShape */
    private $eventstreamShape;

    public function set_up()
    {
        $shape = json_decode(
            file_get_contents(
                __DIR__ . '/../eventstream_fixtures/eventstream_shape.json'
            ),
            true
        );
        $this->eventstreamShape = new StructureShape(
            $shape,
            new ShapeMap(['EventStream' => $shape])
        );
    }

    public function getEventData()
    {
        $events = [];
        foreach (self::$successEventNames as $name) {
            $event = [];
            $event['input'] = base64_decode(file_get_contents(
                __DIR__ . '/../eventstream_fixtures/input/' . $name
            ));
            $event['output'] = [json_decode(
                file_get_contents(
                    __DIR__ . '/../eventstream_fixtures/output/' . $name . '.json'
                ),
                true
            )];
            $event['count'] = 1;
            $events []= $event;
        }

        $combinedInput = '';
        $combinedOutput = [];
        foreach ($events as $event) {
            $combinedInput .= $event['input'];
            $combinedOutput []= $event['output'][0];
        }
        $events []= [
            'input' => $combinedInput,
            'output' => $combinedOutput,
            'count' => count($events),
        ];

        return $events;
    }

    /**
     * @dataProvider getEventData
     */
    public function testEmitsEvents($input, $output, $expectedCount)
    {
        $stream = Psr7\Utils::streamFor($input);
        $iterator = new EventParsingIterator(
            $stream,
            $this->eventstreamShape,
            new RestXmlParser(
                new Service([], function () { return []; })
            )
        );

        $count = 0;
        foreach ($iterator as $event) {
            if (isset($event['Records'])) {
                $this->assertInstanceOf(
                    StreamInterface::class,
                    $event['Records']['Payload']
                );
            }
            $this->assertEquals($output[$count], $event);
            $count++;
        }
        $this->assertEquals($expectedCount, $count);
    }

    public function testThrowsOnErrorEvent()
    {
        $stream = Psr7\Utils::streamFor(
            base64_decode(file_get_contents(
                __DIR__ . '/../eventstream_fixtures/input/error_event'
            ))
        );
        $iterator = new EventParsingIterator(
            $stream,
            $this->eventstreamShape,
            new RestXmlParser(
                new Service([], function () { return []; })
            )
        );

        try {
            $this->assertSame(0, $iterator->key());
            $iterator->current();
            $this->fail('Got event when error expected from stream.');
        } catch (EventStreamDataException $e) {
            $this->assertSame('Event Error', $e->getAwsErrorMessage());
            $this->assertSame('FooError', $e->getAwsErrorCode());
        } catch (\Exception $e) {
            $this->fail('Got other exception when error expected from stream.');
        }
    }

    public function testThrowsOnUnknownMessageType()
    {
        $this->expectExceptionMessage("Failed to parse unknown message type.");
        $this->expectException(\Aws\Api\Parser\Exception\ParserException::class);
        $stream = Psr7\Utils::streamFor(
            base64_decode(file_get_contents(
                __DIR__ . '/../eventstream_fixtures/input/unknown_message_type'
            ))
        );
        $iterator = new EventParsingIterator(
            $stream,
            $this->eventstreamShape,
            new RestXmlParser(
                new Service([], function () { return []; })
            )
        );

        $iterator->current();
    }

    public function testThrowsOnUnknownEventType()
    {
        $this->expectExceptionMessage("Failed to parse without event type.");
        $this->expectException(\Aws\Api\Parser\Exception\ParserException::class);
        $stream = Psr7\Utils::streamFor(
            base64_decode(file_get_contents(
                __DIR__ . '/../eventstream_fixtures/input/unknown_event_type'
            ))
        );
        $iterator = new EventParsingIterator(
            $stream,
            $this->eventstreamShape,
            new RestXmlParser(
                new Service([], function () {
                    return [];
                })
            )
        );

        $iterator->current();
    }
}
