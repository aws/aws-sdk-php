<?php

namespace Aws\Identity;

/**
 * Denotes the use of Bearer Token credentials.
 */
class BearerTokenIdentity implements IdentityInterface
{
    public function getExpiration() {}
}
