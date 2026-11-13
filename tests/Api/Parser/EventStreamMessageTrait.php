<?php
namespace Aws\Test\Api\Parser;

/**
 * Builds binary event stream messages for tests: a prelude, the headers, the
 * payload, and the prelude and message CRC32 checksums.
 *
 * @internal
 */
trait EventStreamMessageTrait
{
    /**
     * Encodes one header.
     *
     * @param string $name
     * @param int $type the header value type byte
     * @param string $value the encoded value
     *
     * @return string
     */
    private static function eventStreamHeader(string $name, int $type, string $value): string
    {
        return chr(strlen($name)) . $name . chr($type) . $value;
    }

    /**
     * Frames one message from encoded headers and a payload.
     *
     * @param string $headers
     * @param string $payload
     *
     * @return string
     */
    private static function eventStreamMessage(string $headers, string $payload = ''): string
    {
        $prelude = pack('NN', 16 + strlen($headers) + strlen($payload), strlen($headers));
        $message = $prelude . pack('N', crc32($prelude)) . $headers . $payload;

        return $message . pack('N', crc32($message));
    }

    /**
     * Frames one message whose headers are all strings.
     *
     * @param array $headers header name => string value
     * @param string $payload
     *
     * @return string
     */
    private static function stringHeaderMessage(array $headers, string $payload): string
    {
        $encoded = '';
        foreach ($headers as $name => $value) {
            $encoded .= self::eventStreamHeader($name, 7, pack('n', strlen($value)) . $value);
        }

        return self::eventStreamMessage($encoded, $payload);
    }
}
