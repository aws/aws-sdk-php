<?php
namespace Aws\RetryConfiguration;

class Configuration implements ConfigurationInterface
{
    private $mode;
    private $maxAttempts;

    public function __construct($mode = 'legacy', $maxAttempts = 3)
    {
        $this->mode = $mode;
        $this->maxAttempts = $maxAttempts;
    }

    /**
     * {@inheritdoc}
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * {@inheritdoc}
     */
    public function getMaxAttempts()
    {
        return $this->maxAttempts;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return [
            'mode' => $this->getMode(),
            'max_attempts' => $this->getMaxAttempts(),
        ];
    }
}
