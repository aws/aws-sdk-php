<?php
namespace Aws\Token;

/**
 * Provides access to an AWS token used for service requests.
 */
interface TokenInterface
{
    /**
     * Returns the token string.
     *
     * @return string
     */
    public function getToken();

    /**
     * Returns the UNIX timestamp when the token expires.
     *
     * @return int|null
     */
    public function getExpiration();

    /**
     * Returns true when the token has expired.
     *
     * @return bool
     */
    public function isExpired();

    /**
     * Converts the token to an associative array.
     *
     * @return array
     */
    public function toArray();
}
