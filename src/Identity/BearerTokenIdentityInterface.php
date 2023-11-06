<?php
namespace Aws\Identity;

/**
 * Denotes the use of Bearer Token credentials.
 */
interface BearerTokenIdentityInterface extends IdentityInterface
{
    public function getToken();
}