<?php
namespace Aws\Exception;

use Psr\Http\Message\ResponseInterface;
use Aws\CommandInterface;

/**
 * Represents an AWS exception that is thrown when a command fails.
 */
class AwsException extends \RuntimeException
{
    /** @var ResponseInterface */
    private $response;
    private $command;
    private $requestId;
    private $errorType;
    private $errorCode;
    private $connectionError;

    /**
     * @param string           $message Exception message
     * @param CommandInterface $command
     * @param array            $context Exception context
     * @param \Exception       $previous  Previous exception (if any)
     */
    public function __construct(
        $message,
        CommandInterface $command,
        array $context,
        \Exception $previous = null
    ) {
        $this->command = $command;
        $this->response = isset($context['response']) ? $context['response'] : null;
        $this->requestId = isset($context['request_id'])
            ? $context['request_id']
            : null;
        $this->errorType = isset($context['type']) ? $context['type'] : null;
        $this->errorCode = isset($context['code']) ? $context['code'] : null;
        $this->connectionError = !empty($context['connection_error']);
        parent::__construct($message, 0, $previous);
    }

    /**
     * Returns true if this is a connection error.
     *
     * @return bool
     */
    public function isConnectionError()
    {
        return $this->connectionError;
    }

    /**
     * If available, gets the HTTP status code of the corresponding response
     *
     * @return int|null
     */
    public function getStatusCode()
    {
        return $this->response ? $this->response->getStatusCode() : null;
    }

    /**
     * Get the request ID of the error. This value is only present if a
     * response was received and is not present in the event of a networking
     * error.
     *
     * @return string|null Returns null if no response was received
     */
    public function getAwsRequestId()
    {
        return $this->requestId;
    }

    /**
     * Get the AWS error type.
     *
     * @return string|null Returns null if no response was received
     */
    public function getAwsErrorType()
    {
        return $this->errorType;
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
}
