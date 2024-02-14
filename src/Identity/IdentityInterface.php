<?php

namespace Aws\Identity;

interface IdentityInterface
{
    /**
     * @return int
     */
    public function getExpiration();
}
