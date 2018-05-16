<?php
namespace Aws\ClientSideMonitoring;

/**
 * Provides access to the AWS CSM configuration options:
 * 'client_id', 'enabled', 'port'
 */
interface CSMConfigInterface
{
    /**
     * Returns whether or not CSM is enabled
     *
     * @return bool
     */
    public function getEnabled();

    /**
     * Returns the client ID if available
     *
     * @return string|null
     */
    public function getClientId();

    /**
     * Get the UNIX timestamp in which the credentials will expire
     *
     * @return int|null
     */
    public function getExpiration();

    /**
     * Returns the port if available
     *
     * @return int|null
     */
    public function getPort();

    /**
     * Check if the credentials are expired
     *
     * @return bool
     */
    public function isExpired();

    /**
     * Converts the config to an associative array.
     *
     * @return array
     */
    public function toArray();
}
