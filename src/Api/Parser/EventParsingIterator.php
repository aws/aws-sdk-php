<?php

namespace Aws\Api\Parser;

use \Iterator;
use Aws\Exception\EventStreamDataException;
use Aws\Api\Parser\Exception\ParserException;
use Aws\Api\StructureShape;
use Psr\Http\Message\StreamInterface;

/**
 * @internal Implements a decoder for a binary encoded event stream that will
 * decode, validate, and provide individual events from the stream.
 */
class EventParsingIterator implements Iterator
{
    /** @var StreamInterface */
    private $decodingIterator;

    /** @var StructureShape */
    private $shape;

    /** @var AbstractParser */
    private $parser;

    /** @var StructureShape|null */
    private $outputShape;

    /** @var bool true when readInitialResponse() has read the first message */
    private $primed = false;

    /**
     * @param StreamInterface $stream
     * @param StructureShape $shape the event stream shape
     * @param AbstractParser $parser
     * @param StructureShape|null $outputShape the operation output shape. When
     *        set, the initial response and modeled exceptions are parsed with
     *        the parser against the model.
     */
    public function __construct(
        StreamInterface $stream,
        StructureShape $shape,
        AbstractParser $parser,
        ?StructureShape $outputShape = null
    ) {
        $this->decodingIterator = $this->chooseDecodingIterator($stream);
        $this->shape = $shape;
        $this->parser = $parser;
        $this->outputShape = $outputShape;
    }

    /**
     * This method choose a decoding iterator implementation based on if the stream
     * is seekable or not.
     *
     * @param $stream
     *
     * @return Iterator
     */
    private function chooseDecodingIterator($stream)
    {
        if ($stream->isSeekable()) {
            return new DecodingEventStreamIterator($stream);
        } else {
            return new NonSeekableStreamDecodingEventStreamIterator($stream);
        }
    }

    /**
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function current()
    {
        return $this->parseEvent($this->decodingIterator->current());
    }

    /**
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function key()
    {
        return $this->decodingIterator->key();
    }

    /**
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function next()
    {
        $this->decodingIterator->next();
    }

    /**
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function rewind()
    {
        if ($this->primed) {
            // readInitialResponse() already read the first message.
            $this->primed = false;
            return;
        }

        $this->decodingIterator->rewind();
    }

    /**
     * Reads the first message from the stream. When it is an initial-response
     * event, returns its members; otherwise returns an empty array and leaves
     * the message as the first item of the iteration.
     *
     * @return array
     *
     * @throws ParserException when the first message cannot be read or decoded
     */
    public function readInitialResponse(): array
    {
        $this->decodingIterator->rewind();
        $this->primed = true;
        if (!$this->decodingIterator->valid()) {
            return [];
        }

        $event = $this->decodingIterator->current();
        $messageType = $event['headers'][':message-type'] ?? '';
        $eventType = $event['headers'][':event-type'] ?? null;
        if (($messageType === '' || $messageType === 'event')
            && $eventType === 'initial-response'
        ) {
            return $this->parseInitialResponseEvent($event['payload'])['initial-response'] ?? [];
        }

        return [];
    }

    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function valid()
    {
        return $this->decodingIterator->valid();
    }

    private function parseEvent(array $event)
    {
        if (!empty($event['headers'][':message-type'])) {
            if ($event['headers'][':message-type'] === 'error') {
                return $this->parseError($event);
            }

            if ($event['headers'][':message-type'] === 'exception') {
                return $this->parseException($event);
            }

            if ($event['headers'][':message-type'] !== 'event') {
                throw new ParserException('Failed to parse unknown message type.');
            }
        }

        $eventType = $event['headers'][':event-type'] ?? null;
        if (empty($eventType)) {
            throw new ParserException('Failed to parse without event type.');
        }

        $eventPayload = $event['payload'];
        if ($eventType === 'initial-response') {
            return $this->parseInitialResponseEvent($eventPayload);
        }

        $eventShape = $this->shape->getMember($eventType);

        return [
            $eventType => array_merge(
                $this->parseEventHeaders($event['headers'], $eventShape),
                $this->parseEventPayload($eventPayload, $eventShape)
            )
        ];
    }

    /**
     * @param $headers
     * @param $eventShape
     *
     * @return array
     */
    private function parseEventHeaders($headers, $eventShape): array
    {
        $parsedHeaders = [];
        foreach ($eventShape->getMembers() as $memberName => $memberProps) {
            if (isset($memberProps['eventheader'])) {
                $parsedHeaders[$memberName] = $headers[$memberName];
            }
        }

        return $parsedHeaders;
    }

    /**
     * @param $payload
     * @param $eventShape
     *
     * @return array
     */
    private function parseEventPayload($payload, $eventShape): array
    {
        $parsedPayload = [];
        foreach ($eventShape->getMembers() as $memberName => $memberProps) {
            $memberShape = $eventShape->getMember($memberName);
            if (isset($memberProps['eventpayload'])) {
                if ($memberShape->getType() === 'blob') {
                    $parsedPayload[$memberName] = $payload;
                } elseif ($memberShape->getType() === 'string') {
                    $parsedPayload[$memberName] = (string) $payload;
                } else {
                    $parsedPayload[$memberName] = $this->parser->parseMemberFromStream(
                        $payload,
                        $memberShape,
                        null
                    );
                }

                break;
            }
        }

        if (empty($parsedPayload) && !empty($payload->getContents())) {
            /**
             * If we did not find a member with an eventpayload trait, then we should deserialize the payload
             * using the event's shape.
             */
            $parsedPayload = $this->parser->parseMemberFromStream($payload, $eventShape, null);
        }

        return $parsedPayload;
    }

    private function parseError(array $event)
    {
        throw new EventStreamDataException(
            $event['headers'][':error-code'],
            $event['headers'][':error-message']
        );
    }

    private function parseException(array $event)
    {
        if ($this->outputShape !== null) {
            $this->parseModeledException($event);
        } else {
            $payload = $event['payload']?->getContents();
            $parsedPayload = json_decode($payload, true);

            throw new EventStreamDataException(
                $event['headers'][':exception-type'] ?? 'Unknown',
                $parsedPayload['message'] ?? $payload,
            );
        }
    }

    private function parseModeledException(array $event): never
    {
        $code = $event['headers'][':exception-type'] ?? 'Unknown';
        $data = [];
        if (isset($event['headers'][':exception-type']) && $this->shape->hasMember($code)) {
            $data = $this->parser->parseMemberFromStream(
                $event['payload'],
                $this->shape->getMember($code),
                null
            ) ?? [];
        }

        $message = '';
        foreach ($data as $name => $value) {
            if (strcasecmp($name, 'message') === 0) {
                $message = (string) $value;
                break;
            }
        }

        throw new EventStreamDataException($code, $message, $data);
    }

    private function parseInitialResponseEvent($payload): array
    {
        if ($this->outputShape === null) {
            return ['initial-response' => json_decode($payload, true)];
        }

        $members = $this->parser->parseMemberFromStream(
            $payload,
            $this->outputShape,
            null
        ) ?? [];
        foreach ($this->outputShape->getMembers() as $name => $member) {
            if (!empty($member['eventstream'])) {
                unset($members[$name]);
            }
        }

        return ['initial-response' => $members];
    }
}
