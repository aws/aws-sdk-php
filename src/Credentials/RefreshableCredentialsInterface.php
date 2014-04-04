<?php
namespace Aws\Credentials;

/**
 * Represents credentials that can be refreshed.
 */
interface RefreshableCredentialsInterface extends CredentialsInterface
{
    /**
     * Force a refresh of the credentials.
     */
    public function refresh();
}
