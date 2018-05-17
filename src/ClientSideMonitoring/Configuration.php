<?php
namespace Aws\ClientSideMonitoring;


class Configuration implements ConfigurationInterface
{
    private $client_id;
    private $enabled;
    private $expires;
    private $port;

    /**
     * Constructs a new Configuration object, with the specified CSM options set
     *
     * @param mixed $enabled
     * @param string|int $port
     * @param string $client_id
     */
    public function __construct($enabled, $port, $client_id = '')
    {
        $this->port = filter_var($port, FILTER_VALIDATE_INT);
        if ($this->port === false) {
            throw new \InvalidArgumentException(
                "CSM 'port' value must be an integer!");
        }

        // Unparsable $enabled flag errs on the side of disabling CSM
        $this->enabled = filter_var($enabled, FILTER_VALIDATE_BOOLEAN);
        $this->client_id = trim($client_id);
    }

    /**
     * Returns whether or not CSM is enabled
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * Returns the client ID if available
     *
     * @return string|null
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * Returns the port if available
     *
     * @return int|null
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Converts the config to an associative array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'client_id' => $this->getClientId(),
            'enabled' => $this->isEnabled(),
            'port' => $this->getPort()
        ];
    }
}