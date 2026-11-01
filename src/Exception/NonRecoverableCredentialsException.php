<?php
namespace Aws\Exception;

/**
 * A credential error that is non-recoverable: retrying the refresh will not
 * succeed without external action.
 *
 * Extends {@see CredentialsException} so existing callers that catch
 * CredentialsException continue to handle it, and implements
 * {@see NonRecoverableCredentialsExceptionInterface} so the caching credential
 * provider recognizes it and raises it immediately without applying the refresh
 * backoff.
 */
class NonRecoverableCredentialsException extends CredentialsException implements
    NonRecoverableCredentialsExceptionInterface
{
    /**
     * STS error codes that are non-recoverable.
     */
    const STS_NON_RECOVERABLE_ERROR_CODES = [
        'AccessDenied',
        'IDPRejectedClaim',
        'InvalidIdentityToken',
        'MalformedPolicyDocument',
        'PackedPolicyTooLarge',
        'RegionDisabledException',
    ];
}
