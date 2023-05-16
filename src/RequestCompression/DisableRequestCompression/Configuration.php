<?php
namespace Aws\RequestCompression\DisableRequestCompression;

use Aws;
use Aws\RequestCompression\Exception\ConfigurationException;

class Configuration implements ConfigurationInterface
{
    private $disableRequestCompression;

    public function __construct($disableRequestCompression)
    {
        $this->disableRequestCompression = Aws\boolean_value($disableRequestCompression);
        if (is_null($this->disableRequestCompression)) {
            throw new ConfigurationException("'disable_request_compression' config option"
                . " must be a boolean value.");
        }
    }

    /**
     * {@inheritdoc}
     */
    public function isDisableRequestCompression()
    {
        return $this->disableRequestCompression;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return [
            'disable_request_compression' => $this->isDisableRequestCompression(),
        ];
    }
}