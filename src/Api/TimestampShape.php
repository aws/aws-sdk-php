<?php
namespace Aws\Api;

/**
 * Represents a timestamp shape.
 */
class TimestampShape extends Shape
{
    public function __construct(array $definition, ShapeMap $shapeMap)
    {
        $definition['type'] = 'timestamp';
        parent::__construct($definition, $shapeMap);
    }

    /**
     * Formats a timestamp value for a service.
     *
     * Sub-second precision provided by the caller is preserved for the
     * `iso8601` and `unixTimestamp` formats. `rfc822` (HTTP-date) only
     * supports whole seconds, so fractional seconds are dropped.
     *
     * @param mixed  $value  Value to format
     * @param string $format Format used to serialize the value
     *
     * @return int|float|string
     * @throws \UnexpectedValueException if the format is unknown.
     * @throws \InvalidArgumentException if the value is an unsupported type.
     */
    public static function format($value, $format)
    {
        if ($value instanceof \DateTimeInterface) {
            $seconds = $value->getTimestamp();
            $micros = (int) $value->format('u');
        } elseif (is_string($value)) {
            $seconds = strtotime($value);
            // strtotime() discards fractional seconds; re-parse to keep them.
            $micros = $seconds === false
                ? 0
                : (int) (new \DateTimeImmutable($value))->format('u');
        } elseif (is_int($value)) {
            $seconds = $value;
            $micros = 0;
        } elseif (is_float($value)) {
            $seconds = (int) floor($value);
            $micros = (int) round(($value - $seconds) * 1000000);
            if ($micros === 1000000) {
                $seconds++;
                $micros = 0;
            }
        } else {
            throw new \InvalidArgumentException('Unable to handle the provided'
                . ' timestamp type: ' . gettype($value));
        }

        switch ($format) {
            case 'iso8601':
                $fraction = $micros === 0 ? '' : sprintf('.%06d', $micros);
                return gmdate('Y-m-d\TH:i:s', (int) $seconds) . $fraction . 'Z';
            case 'rfc822':
                return gmdate('D, d M Y H:i:s \G\M\T', (int) $seconds);
            case 'unixTimestamp':
                if (is_float($value)) {
                    // Pass through the caller's float untouched.
                    return $value;
                }
                if ($micros === 0) {
                    return $seconds;
                }
                // Add the microseconds as integers before dividing so the
                // float is only rounded once. Dividing first and then adding
                // rounds twice, which can produce a slightly different value,
                // e.g. 1 + 3691 / 10**6 gives 1.0036909999999999 instead of
                // 1.003691.
                return ($seconds * 1000000 + $micros) / 1000000;
            default:
                throw new \UnexpectedValueException('Unknown timestamp format: '
                    . $format);
        }
    }

    /**
     * Formats a timestamp value for a service as a string.
     *
     * Behaves like {@see format()}, except that a `unixTimestamp` value is
     * returned as a decimal string (e.g. "1704110400.123456"). Casting a
     * float to a string directly is subject to the `precision` ini setting
     * (14 significant digits by default), which would silently drop the
     * sub-second component of an epoch-seconds timestamp.
     *
     * @param mixed  $value  Value to format
     * @param string $format Format used to serialize the value
     *
     * @return string
     * @throws \UnexpectedValueException if the format is unknown.
     * @throws \InvalidArgumentException if the value is an unsupported type.
     */
    public static function formatAsString($value, $format): string
    {
        $formatted = self::format($value, $format);
        if (is_float($formatted)) {
            // Round to microseconds and trim insignificant trailing zeros.
            $formatted = rtrim(rtrim(sprintf('%.6F', $formatted), '0'), '.');
        }

        return (string) $formatted;
    }
}
