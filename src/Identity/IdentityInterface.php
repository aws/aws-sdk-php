<?php
namespace Aws\Identity;

/**
 *  Defines identity for authenticating to AWS services.
 */
interface IdentityInterface
{
    /**
     * Returns the identity expiration time, if available.
     *
     * @return int | null
     */
    public function getExpiration();
}