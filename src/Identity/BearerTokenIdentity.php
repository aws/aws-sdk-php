<?php
namespace Aws\Identity;

/**
 * Denotes the use of Bearer Token credentials.
 */
interface BearerTokenIdentity implements IdentityInterface
{
    public function getToken();
}