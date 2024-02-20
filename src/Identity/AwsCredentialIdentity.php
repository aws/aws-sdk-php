<?php

namespace Aws\Identity;

/**
 * Denotes the use of standard AWS credentials.
 *
 * @internal
 */
class AwsCredentialIdentity implements IdentityInterface
{
    public function getExpiration() {}
}
