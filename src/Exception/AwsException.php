<?php
namespace Aws\Exception;

use GuzzleHttp\Command\Exception\CommandException;

/**
 * Represents an AWS exception that is thrown when a command fails.
 */
class AwsException extends CommandException
{
    /** @var array */
    private $error;

    /**
     * @param CommandException $previous The wrapped command exception
     */
    public function __construct(CommandException $previous)
    {
        $this->error = $previous['aws_error'];
        parent::__construct(
            "AWS Error: {$this->error['message']}: " . $previous->getMessage(),
            $previous->getClient(),
            $previous->getCommand(),
            $previous->getRequest(),
            $previous->getResponse(),
            $previous
        );
    }

    /**
     * Get the name of the web service that encountered the error.
     *
     * @return string
     */
    public function getServiceName()
    {
        return $this->getClient()->getApi()->getName();
    }

    /**
     * Get the service description model of the web service.
     *
     * @return \Aws\Api\Service
     */
    public function getApi()
    {
        return $this->getClient()->getApi();
    }

    /**
     * Get the request ID of the error. This value is only present if a
     * response was received and is not present in the event of a networking
     * error.
     *
     * @return string|null
     */
    public function getAwsRequestId()
    {
        return $this->error['request_id'];
    }

    /**
     * Get the AWS error type.
     *
     * @return string
     */
    public function getAwsErrorType()
    {
        return $this->error['type'];
    }

    /**
     * Get the AWS error code.
     *
     * @return string
     */
    public function getAwsErrorCode()
    {
        return $this->error['code'];
    }
}
