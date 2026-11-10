<?php
namespace Aws\Exception;

/**
 * Raised when the initial credential fetch fails and nothing is cached to fall
 * back on.
 *
 * A non-recoverable source error ({@see NonRecoverableCredentialsExceptionInterface}) is raised unchanged.
 * Every other initial-fetch failure becomes this error.
 */
class NoCredentialsException extends CredentialsException {}
