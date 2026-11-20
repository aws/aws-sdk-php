<?php
namespace Aws\Exception;

/**
 * Raised by {@see \Aws\Credentials\CredentialDaemonProvider} when a profile
 * that uses a credential daemon cannot get credentials from it.
 *
 * The error code can be read with {@see getErrorCode()} and is one of the
 * constants of this class.
 */
class CredentialDaemonException extends CredentialsException
{
    const NOT_RUNNING = 'NOT_RUNNING';
    const REAUTH_REQUIRED = 'REAUTH_REQUIRED';
    const CREDENTIAL_NOT_FOUND = 'CREDENTIAL_NOT_FOUND';
    const REQUEST_REJECTED = 'REQUEST_REJECTED';
    const UNSUPPORTED_MATERIAL = 'UNSUPPORTED_MATERIAL';
    const PROTOCOL_ERROR = 'PROTOCOL_ERROR';
    const INVALID_CONFIG = 'INVALID_CONFIG';
    const UNSUPPORTED_PLATFORM = 'UNSUPPORTED_PLATFORM';

    /** @var string */
    private $errorCode;

    /**
     * @param string          $message
     * @param string          $errorCode One of the constants of this class.
     * @param \Throwable|null $previous
     */
    public function __construct(
        string $message,
        string $errorCode,
        ?\Throwable $previous = null
    ) {
        parent::__construct($message, 0, $previous);
        $this->errorCode = $errorCode;
    }

    /**
     * Returns the error code, one of the constants of this class.
     *
     * @return string
     */
    public function getErrorCode(): string
    {
        return $this->errorCode;
    }
}
