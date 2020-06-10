<?php
namespace Aws\Api;

use Aws\Api\Parser\Exception\ParserException;
use Exception;

/**
 * DateTime overrides that make DateTime work more seamlessly as a string,
 * with JSON documents, and with JMESPath.
 */
class DateTimeResult extends \DateTime implements \JsonSerializable
{
    /**
     * Create a new DateTimeResult from a unix timestamp.
     *
     * @param $unixTimestamp
     *
     * @return DateTimeResult
     */
    public static function fromEpoch($unixTimestamp)
    {
        // The Unix epoch (or Unix time or POSIX time or Unix
        // timestamp) is the number of seconds that have elapsed since
        // January 1, 1970 (midnight UTC/GMT).
        return new self(gmdate('c', $unixTimestamp));
    }

    /**
     * Create a new DateTimeResult from an unknown timestamp.
     *
     * @param $timestamp
     *
     * @return DateTimeResult
     * @throws ParserException|Exception
     */
    public static function fromTimestamp($timestamp)
    {
        if (!empty($timestamp) && (is_string($timestamp) || is_int($timestamp))) {
            if (\Aws\is_valid_epoch($timestamp)){
                return self::fromEpoch(intval($timestamp));
            }
            return new DateTimeResult($timestamp);
        }
        throw new ParserException('Invalid timestamp value passed');
    }

    /**
     * Serialize the DateTimeResult as an ISO 8601 date string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->format('c');
    }

    /**
     * Serialize the date as an ISO 8601 date when serializing as JSON.
     *
     * @return mixed|string
     */
    public function jsonSerialize()
    {
        return (string) $this;
    }
}

