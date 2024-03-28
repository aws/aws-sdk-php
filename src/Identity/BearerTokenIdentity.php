<?php

namespace Aws\Identity;

/**
 * Denotes the use of Bearer Token credentials.
 *
 * @internal
 */
class BearerTokenIdentity implements IdentityInterface
{
    public function getExpiration() {}
}
