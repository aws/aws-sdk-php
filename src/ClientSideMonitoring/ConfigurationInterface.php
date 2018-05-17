<?php
namespace Aws\ClientSideMonitoring;

/**
 * Provides access to the AWS CSM configuration options:
 * 'client_id', 'enabled', 'port'
 */
interface ConfigurationInterface
{
    /**
     * Returns whether or not CSM is enabled
     *
     * @return bool
     */
    public function isEnabled();

    /**
     * Returns the client ID if available
     *
     * @return string|null
     */
    public function getClientId();

    /**
     * Returns the port if available
     *
     * @return int|null
     */
    public function getPort();

    /**
     * Converts the config to an associative array.
     *
     * @return array
     */
    public function toArray();
}
