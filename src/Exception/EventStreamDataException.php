<?php
namespace Aws\Exception;

/**
 * Represents an exception that was supplied via an EventStream.
 */
class EventStreamDataException extends \RuntimeException
{
    private $errorCode;
    private $errorMessage;
    private $data;

    /**
     * @param string $code the exception type of the event
     * @param string $message
     * @param array $data the modeled members of the exception event
     */
    public function __construct($code, $message, array $data = [])
    {
        $this->errorCode = $code;
        $this->errorMessage = $message;
        $this->data = $data;
        parent::__construct($message);
    }

    /**
     * Check if a modeled member of the exception event is set.
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasKey($name)
    {
        return isset($this->data[$name]);
    }

    /**
     * Get a modeled member of the exception event.
     *
     * @param string $key
     *
     * @return mixed|null
     */
    public function get($key)
    {
        return $this->data[$key] ?? null;
    }

    /**
     * Get the AWS error code.
     *
     * @return string|null Returns null if no response was received
     */
    public function getAwsErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * Get the concise error message if any.
     *
     * @return string|null
     */
    public function getAwsErrorMessage()
    {
        return $this->errorMessage;
    }
}
