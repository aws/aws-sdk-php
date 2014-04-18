<?php

namespace Aws\Waiter;

use GuzzleHttp\Event\AbstractEvent;

class WaitEvent extends AbstractEvent
{
    /** @var array Waiter configuration options */
    private $config;

    /** @var int Number of attempts the Waiter has made */
    private $attempts;

    /** @var bool Whether or not the config has be updated */
    private $updated = false;

    /**
     * @param array $config
     * @param int   $attempts
     */
    public function __construct(array $config, $attempts)
    {
        $this->config = $config;
        $this->attempts = (int) $attempts;
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function getAttempts()
    {
        return $this->attempts;
    }

    public function setConfig($key, $value = null)
    {
        if (is_array($key)) {
            $this->config = $key;
        } else {
            $this->config[$key] = $value;
        }

        $this->updated = true;

        return $this;
    }

    public function isConfigUpdated()
    {
        return $this->updated;
    }
}
