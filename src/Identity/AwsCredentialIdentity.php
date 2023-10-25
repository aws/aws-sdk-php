<?php
namespace Aws\Identity;

use Aws\Identity\IdentityInterface;
/**
 * Denotes the use of standard AWS credentials.
 */
interface AwsCredentialIdentity implements IdentityInterface
{
    public function getAccessKeyId();

    public function getSecretKey();

    public function getSecurityToken();
}