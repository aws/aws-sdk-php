<?php
namespace Aws\Credentials;

use Aws\Exception\CredentialsException;

/**
 * Represents credentials that can be refreshed.
 */
interface RefreshableCredentialsInterface extends CredentialsInterface
{
    /**
     * Refresh the credentials.
     *
     * @throws CredentialsException on error.
     */
    public function refresh();
}
