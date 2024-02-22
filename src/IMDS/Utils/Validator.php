<?php

namespace Aws\IMDS\Utils;

use RuntimeException;

final class Validator
{

    private function __construct() {}

    /**
     * @param $value
     * @param $message
     * @return mixed
     */
    public static function ifNullThrowException($value, $message) {
        if (is_null($value)) {
            self::throwException($message);
        }

        return $value;
    }

    /**
     * @param string $value
     * @param array $options
     * @param string $initialMessage
     * @return mixed
     */
    public static function ifNotInThrowException($value, $options, $initialMessage, $exceptionClass='RuntimeException') {
        if (!in_array(strtolower($value), array_map('strtolower', $options))) {
            self::throwException($initialMessage . " should be one of the following options: " . implode(",", $options), $exceptionClass);
        }

        return $value;
    }

    /**
     * @param string $value
     * @param int $FILTER_VALIDATE_URL
     * @param string $message
     * @return string
     */
    public static function ifNotMatchesExprThrowException($value, $FILTER_VALIDATE_URL, $message) {
        if (!filter_var($value, $FILTER_VALIDATE_URL)) {
            self::throwException($message);
        }

        return $value;
    }

    /**
     * @param object $obj
     * @param string $class
     * @return void
     */
    public static function ifNotInstanceOfThrowException($obj, $class)
    {
        if (!($obj instanceof $class)) {
            self::throwException((is_object($obj) ? 'The object ' . get_class($obj) : 'The type ' . gettype($obj)) . ' should be an instance of ' . $class);
        }
    }

    /**
     * @param string $message
     * @para
     * @return mixed
     */
    public static function throwException($message, $exceptionClass='RuntimeException')
    {
        throw new $exceptionClass($message);
    }
}
