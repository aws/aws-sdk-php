<?php
namespace Aws\Exception;

/**
 * Marks a credential error as non-recoverable: retrying will not succeed
 * without external action, such as re-running `aws sso login`.
 *
 * The caching credential provider raises such an error to the caller
 * immediately and skips the refresh backoff.
 */
interface NonRecoverableCredentialsExceptionInterface extends \Throwable {}
