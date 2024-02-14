<?php

namespace Aws\Auth;

use Aws\Identity\IdentityInterface;

/**
 *
 */
interface AuthSchemeResolverInterface
{
    /**
     * @param array $authSchemes
     * @param IdentityInterface $identity
     * @return string
     */
    public function selectAuthScheme(
        array $authSchemes,
        IdentityInterface $identity
    ): string;
}
