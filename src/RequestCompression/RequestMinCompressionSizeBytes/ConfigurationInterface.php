<?php
namespace Aws\RequestCompression\RequestMinCompressionSizeBytes;

interface ConfigurationInterface
{
    /**
     * Returns whether or not request compression is disabled
     *
     * @return bool
     */
    public function getMinCompressionSize();

    /**
     * Returns the configuration as an associative array
     *
     * @return array
     */
    public function toArray();
}