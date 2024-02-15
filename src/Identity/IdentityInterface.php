<?php

namespace Aws\Identity;

/**
 * @internal
 */
interface IdentityInterface
{
    /**
     * @return int
     */
    public function getExpiration();
}
