<?php
namespace Aws\OperationTrait\RequestCompressionTrait\RequestMinCompressionSizeBytes;

use Aws;
use Aws\OperationTrait\RequestCompressionTrait\Exception\ConfigurationException;

class Configuration implements ConfigurationInterface
{
    private $minCompressionSizeBytes;

    public function __construct($requestMinCompressionSizeBytes)
    {
        if (!is_numeric($requestMinCompressionSizeBytes)
            || intval($requestMinCompressionSizeBytes) != $requestMinCompressionSizeBytes
            || $this->isOutOfRange($requestMinCompressionSizeBytes)
        ) {
            throw new ConfigurationException("'min_compression_size_bytes' config option"
                . " must be an integer between 0 and 10485760, inclusive.");
        }
        $this->minCompressionSizeBytes = $requestMinCompressionSizeBytes;
    }

    /**
     * {@inheritdoc}
     */
    public function getMinCompressionSize()
    {
        return $this->minCompressionSizeBytes;
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

    private function isOutOfRange($bytes)
    {
        return $bytes < 0 || $bytes > 10485760;
    }
}