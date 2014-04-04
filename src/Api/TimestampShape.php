<?php
namespace Aws\Api;

/**
 * Represents a timestamp shape.
 */
class TimestampShape extends Shape
{
    /**
     * Formats a timestamp value for a service.
     *
     * @param mixed  $value         Value to format
     * @param string $defaultFormat Default format to use when none is provided
     *
     * @return int|string
     * @throws \UnexpectedValueException if the format is unknown.
     * @throws \InvalidArgumentException if the value is an unsupported type.
     */
    public function format($value, $defaultFormat)
    {
        $format = $this['timestampFormat'] ?: $defaultFormat ?: 'iso8601';

        if ($value instanceof \DateTime) {
            $value = $value->getTimestamp();
        } elseif (is_string($value)) {
            $value = strtotime($value);
        } elseif (!is_int($value)) {
            throw new \InvalidArgumentException('Unable to handle the provided'
                . ' timestamp type: ' . gettype($value));
        }

        switch ($format) {
            case 'iso8601':
                return gmdate('Ymd\THis\Z', $value);
            case 'rfc822':
                return gmdate('D, d M Y H:i:s \G\M\T', $value);
            case 'unixTimestamp':
                return $value;
            default:
                throw new \UnexpectedValueException('Unknown timestamp format: '
                    . $format);
        }
    }
}
