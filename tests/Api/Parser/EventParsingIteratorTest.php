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

/**
 * @covers Aws\Api\Parser\EventParsingIterator
 */
class EventParsingIteratorTest extends \PHPUnit_Framework_TestCase
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

    public function setUp()
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
        $stream = Psr7\stream_for($input);
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
        $stream = Psr7\stream_for(
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
            $this->assertEquals(0, $iterator->key());
            $iterator->current();
            $this->fail('Got event when error expected from stream.');
        } catch (EventStreamDataException $e) {
            $this->assertEquals('Event Error', $e->getAwsErrorMessage());
            $this->assertEquals('FooError', $e->getAwsErrorCode());
        } catch (\Exception $e) {
            $this->fail('Got other exception when error expected from stream.');
        }
    }

    /**
     * @expectedException Aws\Api\Parser\Exception\ParserException
     * @expectedExceptionMessage Failed to parse unknown message type.
     */
    public function testThrowsOnUnknownMessageType()
    {
        $stream = Psr7\stream_for(
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

    /**
     * @expectedException Aws\Api\Parser\Exception\ParserException
     * @expectedExceptionMessage Failed to parse without event type.
     */
    public function testThrowsOnUnknownEventType()
    {
        $stream = Psr7\stream_for(
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
