<?php
namespace Aws\ClientSideMonitoring;


class CSMConfig implements CSMConfigInterface
{
    private $client_id;
    private $enabled;
    private $expires;
    private $port;

    /**
     * Constructs a new CSMConfig object, with the specified CSM options set
     *
     * @param mixed $enabled
     * @param string|int $port
     * @param string $client_id
     * @param null|int $expires
     */
    public function __construct($enabled, $port, $client_id = '', $expires = null)
    {
        $this->port = filter_var($port, FILTER_VALIDATE_INT);
        if ($this->port === false) {
            throw new \InvalidArgumentException(
                "CSM 'port' value must be an integer!");
        }

        // Unparsable $enabled flag errs on the side of disabling CSM
        $this->enabled = filter_var($enabled, FILTER_VALIDATE_BOOLEAN);
        $this->client_id = trim($client_id);
        $this->expires = $expires;
    }

    /**
     * Returns whether or not CSM is enabled
     *
     * @return bool
     */
    public function getEnabled()
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
     * @return int|null
     */
    public function getExpiration()
    {
        return $this->expires;
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
     * @return bool
     */
    public function isExpired()
    {
        return $this->expires !== null && time() >= $this->expires;
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
            'enabled' => $this->getEnabled(),
            'port' => $this->getPort()
        ];
    }
}